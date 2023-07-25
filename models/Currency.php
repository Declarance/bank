<?php

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

    public function getOtherCurrencies()
    {
        return Currency::find()->where(['not in', 'id', $this->id])->all();
    }
}
