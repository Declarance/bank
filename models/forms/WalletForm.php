<?php

namespace app\models\forms;

use yii\base\Model;

class WalletForm extends Model
{
    public $currencyId;

    public function rules()
    {
        return [
            ['currencyId', 'required'],
            ['currencyId', 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'currencyId' => 'Валюта',
        ];
    }
}
