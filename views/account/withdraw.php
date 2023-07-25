<?php

/**
 * @var yii\web\View $this
 * @var ActiveForm $form
 * @var \app\models\forms\AccountForm $model
 * @var Account $account
 */

$this->title = 'Списание средств';

use app\models\Currency;
use app\models\Account;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php

    $form = ActiveForm::begin(['id' => 'withdraw-form']);

    echo $form->field($model, 'currencyId')->dropDownList(ArrayHelper::map($account->getAvailableCurrencies(), 'id', 'name'));
    echo $form->field($model, 'value')->textarea();

    ?>

    <div class="form-group">
        <?= Html::submitButton('Списать', ['class' => 'btn btn-primary', 'name' => 'withdraw-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
