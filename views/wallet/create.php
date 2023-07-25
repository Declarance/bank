<?php

/**
 * @var yii\web\View $this
 * @var yii\bootstrap5\ActiveForm $form
 * @var \app\models\forms\WalletForm $model
 * @var \app\models\Account $account
 */

$this->title = 'Создание кошелька';

use app\models\Currency;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>

    <?= $form->field($model, 'currencyId')->dropDownList(ArrayHelper::map($account->freeCurrencies, 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
