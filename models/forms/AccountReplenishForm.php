<?php

namespace app\models\forms;

use yii\base\Model;

class AccountReplenishForm extends Model
{
    public $currencyId;
    public $value;

    public function rules()
    {
        return [
            [['currencyId', 'value'], 'required'],
            ['currencyId', 'integer'],
            ['value', 'double'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'currencyId' => 'Валюта',
            'value' => 'Значение',
        ];
    }
}
