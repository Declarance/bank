<?php

declare(strict_types=1);

namespace app\models\forms;

use yii\base\Model;

/**
 * @property int $toCurrencyId
 * @property float $rate
 */
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
