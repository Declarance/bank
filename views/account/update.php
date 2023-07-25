<?php

/**
 * @var yii\web\View $this
 * @var yii\bootstrap5\ActiveForm $form
 * @var \app\models\forms\AccountForm $model
 */

$this->title = 'Изменение счета';

use app\models\Currency;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php

    $form = ActiveForm::begin(['id' => 'update-form']);

    echo $form->field($model, 'defaultCurrencyId')->dropDownList(ArrayHelper::map(Currency::find()->all(), 'id', 'name'));

    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
