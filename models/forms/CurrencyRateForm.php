<?php

namespace app\models\forms;

use yii\base\Model;

class CurrencyRateForm extends Model
{
    public $toCurrencyId;
    public $rate;

    public function rules()
    {
        return [
            [['toCurrencyId', 'rate'], 'required'],
            ['toCurrencyId', 'integer'],
            ['rate', 'double'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'toCurrencyId' => 'Отношение к валюте',
            'rate' => 'Курс',
        ];
    }
}
