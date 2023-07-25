<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Exception;
use Yii;

/**
 * @property int $id
 * @property int $accountId
 * @property int $currencyId
 * @property float $value
 */
class Wallet extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{wallets}}';
    }

    public function getAccount(): ActiveQuery
    {
        return $this->hasOne(Account::class, ['id' => 'accountId']);
    }

    public function getCurrency(): ActiveQuery
    {
        return $this->hasOne(Currency::class, ['id' => 'currencyId']);
    }

    public function replenish(float $value)
    {
        $this->value += $value;
        $this->save();
    }

    public function withdraw(float $value)
    {
        if ($value > $this->value) {
            $this->value = 0;
        } else {
            $this->value -= $value;
        }

        $this->save();
    }
}
