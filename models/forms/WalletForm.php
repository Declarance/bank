<?php

declare(strict_types=1);

namespace app\models\forms;

use yii\base\Model;

/**
 * @property int $currencyId
 */
class WalletForm extends Model
{
    public $currencyId;

    public function rules(): array
    {
        return [
            ['currencyId', 'required'],
            ['currencyId', 'integer'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'currencyId' => 'Валюта',
        ];
    }
}
