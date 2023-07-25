<?php

namespace app\models\forms;

use yii\base\Model;

class AccountForm extends Model
{
    public $defaultCurrencyId;

    public function rules()
    {
        return [
            ['defaultCurrencyId', 'required'],
            ['defaultCurrencyId', 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'defaultCurrencyId' => 'Валюта по умолчанию',
        ];
    }
}
