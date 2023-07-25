<?php

/**
 * @var yii\web\View $this
 * @var ActiveForm $form
 * @var \app\models\forms\AccountReplenishForm $model
 * @var Account $account
 */

$this->title = 'Пополнение счета';

use app\models\Currency;
use app\models\Account;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php

    $form = ActiveForm::begin(['id' => 'replenish-form']);

    echo $form->field($model, 'currencyId')->dropDownList(ArrayHelper::map($account->getAvailableCurrencies(), 'id', 'name'));
    echo $form->field($model, 'value')->textarea();

    ?>

    <div class="form-group">
        <?= Html::submitButton('Пополнить', ['class' => 'btn btn-success', 'name' => 'replenish-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
