<?php

namespace app\models\forms;

use app\models\Wallet;
use yii\base\Model;

class AccountWithdrawForm extends Model
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
