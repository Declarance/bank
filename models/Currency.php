<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property float $exchangeWeight
 * @property int $isActive
 */
class Currency extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{currencies}}';
    }

    /**
     * Получить остальные валюты помимо текущей
     *
     * @return array|ActiveRecord[]
     */
    public function getOtherCurrencies(): array
    {
        return Currency::find()->where(['not in', 'id', $this->id])->all();
    }
}
