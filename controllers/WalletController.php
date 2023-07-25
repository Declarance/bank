<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\forms\WalletForm;
use app\models\Wallet;
use app\models\Account;
use yii\web\Controller;
use Yii;
use yii\web\Response;

class WalletController extends Controller
{
    public function actionCreate(int $accountId): Response|string
    {
        $model = new WalletForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $wallet = new Wallet();
            $wallet->accountId = $accountId;
            $wallet->currencyId = $model->currencyId;
            $wallet->save();

            return $this->redirect(['account/index']);
        } else {
            return $this->render('create', ['model' => $model, 'account' => Account::findOne($accountId)]);
        }
    }

    public function actionDelete(int $id): Response
    {
        $model = Wallet::findOne($id);
        $model->delete();

        return $this->redirect(['account/index']);
    }
}
