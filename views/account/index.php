<?php

/**
 * @var yii\web\View $this
 * @var yii\bootstrap5\ActiveForm $form
 * @var array<\app\models\Account> $accounts
 */

use yii\helpers\Html;

$counter = 1;

?>

<div class="row">
    <h1>Счета</h1>
</div>

<div class="row">
    <div class="col-2"><?= Html::a('Создать', ['account/create'], ['class' => 'btn btn-sm btn-secondary']) ?></div>
</div>

<?php foreach ($accounts as $account): ?>
    <div class="card mt-3 w-75">
        <div class="card-header">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col">
                        <h3>Счёт №<?= $counter++ ?></h3>
                    </div>

                    <div class="col">
                        <div class="btn-group">
                            <?= Html::a('Пополнить', ['account/replenish', 'id' => $account->id], ['class' => 'btn btn-sm btn-outline-success']) ?>
                            <?= Html::a('Списать', ['account/withdraw', 'id' => $account->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                            <?= Html::a('Изменить', ['account/update', 'id' => $account->id], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                            <?= Html::a('Удалить', ['account/delete', 'id' => $account->id], ['class' => 'btn btn-sm btn-outline-danger']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <p>id: <?= Html::encode($account->id) ?></p>
            <p>Валюта по умолчанию: <?= Html::encode(($account->defaultCurrency)->name) ?></p>
            <p>Баланс: <strong><?= Html::encode($account->balance) ?></strong> <?= Html::encode(($account->defaultCurrency)->name) ?></p>

            <div class="row">
                <div class="col-3">
                    <?= Html::a('+ Создать кошелек', ['wallet/create', 'accountId' => $account->id], ['class' => 'btn btn-lg btn-primary']) ?>
                </div>

                <?php foreach ($account->wallets as $wallet): ?>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-10">
                                        <?= Html::encode($wallet->value) ?>
                                        <?= Html::encode(($wallet->currency)->name) ?>
                                    </div>

                                    <div class="col-2">
                                        <?= Html::a('X', ['wallet/delete', 'id' => $wallet->id], ['class' => 'text-danger']) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
