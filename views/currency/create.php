<?php

/**
 * @var yii\web\View $this
 * @var yii\bootstrap5\ActiveForm $form
 * @var \app\models\forms\CurrencyForm $model
 */

$this->title = 'Создание валюты';

use app\models\Currency;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Создание валюты
    </p>

    <?php

    $form = ActiveForm::begin(['id' => 'create-form']);

    echo $form->field($model, 'name')->textarea();

    ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
