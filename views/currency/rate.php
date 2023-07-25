<?php

/**
 * @var yii\web\View $this
 * @var yii\bootstrap5\ActiveForm $form
 * @var \app\models\forms\CurrencyForm $model
 * @var Currency $currency
 */

$this->title = 'Курс валюты';

use app\models\Currency;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<div class="site-about">
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <hr>

    <?php $form = ActiveForm::begin(['id' => 'rate-form']); ?>

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-3">
                <h1>1 <?= $currency->name ?> = </h1>
            </div>

            <div class="col-3">
                <?= $form->field($model, 'rate')->textarea(); ?>
            </div>

            <div class="col-3">
                <?= $form->field($model, 'toCurrencyId')->dropDownList(ArrayHelper::map($currency->otherCurrencies, 'id', 'name')); ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
