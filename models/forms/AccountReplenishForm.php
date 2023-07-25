<?php

declare(strict_types=1);

namespace app\models\forms;

use yii\base\Model;

/**
 * @property int $currencyId
 * @property float $value
 */
class AccountReplenishForm extends Model
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
