<?php

declare(strict_types=1);

namespace app\models\forms;

use app\models\Wallet;
use yii\base\Model;

/**
 * @property int $currencyId
 * @property float $value
 */
class AccountWithdrawForm extends Model
{
    public $currencyId;
    public $value;

    public function rules(): array
    {
        return [
            [['currencyId', 'value'], 'required'],
            ['currencyId', 'integer'],
            ['value', 'double'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'currencyId' => 'Валюта',
            'value' => 'Значение',
        ];
    }
}
