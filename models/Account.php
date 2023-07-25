<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $defaultCurrencyId
 */
class Account extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{accounts}}';
    }

    public function getWallets(): ActiveQuery
    {
        return $this->hasMany(Wallet::class, ['accountId' => 'id']);
    }

    public function getDefaultCurrency(): ActiveQuery
    {
        return $this->hasOne(Currency::class, ['id' => 'defaultCurrencyId']);
    }

    public function getBalance(): float
    {
        $balance = 0;

        foreach ($this->wallets as $wallet) {
            $balance += $wallet->value * ($wallet->currency)->exchangeWeight;
        }

        return round($balance / ($this->defaultCurrency)->exchangeWeight, 2);
    }

    public function getWalletByCurrencyId(int $currencyId)
    {
        return Wallet::find()->where(['accountId' => $this->id])->andWhere(['currencyId' => $currencyId])->one();
    }

    public function replenish(int $currencyId, float $value)
    {
        $wallet = $this->getWalletByCurrencyId($currencyId);
        $wallet->replenish($value);
    }

    /**
     * Возвращает массив валют из которых созданы кошельки
     *
     * @return array<Currency>
     */
    public function getAvailableCurrencies(): array
    {
        $currencies = [];

        foreach ($this->wallets as $wallet) {
            $currencies[] = $wallet->currency;
        }

        return $currencies;
    }

    /**
     * Возвращает массив валют из которых не созданы кошельки
     *
     * @return array<Currency>
     */
    public function getFreeCurrencies(): array
    {
        $currencies = Currency::find()->all();

        foreach ($this->wallets as $wallet) {
            unset($currencies[array_search($wallet->currency, $currencies)]);
        }

        return $currencies;
    }

    public function withdraw(int $currencyId, float $value)
    {
        /** @var Wallet $wallet */
        $wallet = $this->getWalletByCurrencyId($currencyId);
        $wallet->withdraw($value);
    }
}
