<?php

/**
 * @var yii\web\View $this
 * @var yii\bootstrap5\ActiveForm $form
 * @var array<\app\models\Currency> $currencies
 */

use yii\helpers\Html;

?>

<div class="row">
    <h1>Валюта</h1>
</div>

<div class="row">
    <div class="col-2"><?= Html::a('Создать', ['currency/create'], ['class' => 'btn btn-sm btn-secondary']) ?></div>
</div>

<?php foreach ($currencies as $currency): ?>
    <div class="card mt-3 w-75">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h3><?= Html::encode($currency->name) ?></h3>
                    </div>

                    <div class="col-4">
                        <div class="btn-group">
                            <?= Html::a('Задать курс', ['currency/rate', 'id' => $currency->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                            <?= Html::a('Удалить', ['currency/delete', 'id' => $currency->id], ['class' => 'btn btn-sm btn-outline-danger']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
        </div>
    </div>
<?php endforeach; ?>
