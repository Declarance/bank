<?php

namespace app\controllers;

use app\models\forms\WalletForm;
use app\models\Wallet;
use app\models\Account;
use yii\web\Controller;
use Yii;

class WalletController extends Controller
{
    public function actionCreate(int $accountId)
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

    public function actionDelete(int $id)
    {
        $model = Wallet::findOne($id);
        $model->delete();

        return $this->redirect(['account/index']);
    }
}
