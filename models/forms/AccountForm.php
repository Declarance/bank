<?php

declare(strict_types=1);

namespace app\models\forms;

use yii\base\Model;

/**
 * @property int $defaultCurrencyId
 */
class AccountForm extends Model
{
    public $defaultCurrencyId;

    public function rules(): array
    {
        return [
            ['defaultCurrencyId', 'required'],
            ['defaultCurrencyId', 'integer']
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'defaultCurrencyId' => 'Валюта по умолчанию',
        ];
    }
}
