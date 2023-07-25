<?php

declare(strict_types=1);

namespace app\models\forms;

use yii\base\Model;

/**
 * @property string $name
 */
class CurrencyForm extends Model
{
    public $name;

    public function rules(): array
    {
        return [
            ['name', 'required'],
            ['name', 'string'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'name' => 'Наименование',
        ];
    }
}
