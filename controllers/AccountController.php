<?php

namespace app\controllers;

use app\models\Account;
use app\models\forms\AccountForm;
use app\models\forms\AccountReplenishForm;
use app\models\forms\AccountWithdrawForm;
use Yii;
use yii\web\Controller;

class AccountController extends Controller
{
    public function actionIndex()
    {
        $accounts = Account::find()->all();

        return $this->render('index', ['accounts' => $accounts]);
    }

    public function actionCreate()
    {
        $model = new AccountForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $account = new Account();
            $account->defaultCurrencyId = $model->defaultCurrencyId;
            $account->save();

            return $this->redirect(['account/index']);
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    public function actionUpdate(int $id)
    {
        $model = new AccountForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $account = Account::findOne($id);
            $account->defaultCurrencyId = $model->defaultCurrencyId;
            $account->save();

            return $this->redirect(['account/index']);
        } else {
            return $this->render('update', ['model' => $model]);
        }
    }

    public function actionDelete(int $id)
    {
        $model = Account::findOne($id);
        $model->delete();

        return $this->redirect(['account/index']);
    }

    public function actionReplenish(int $id)
    {
        $model = new AccountReplenishForm();
        $account = Account::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $account->replenish($model->currencyId, $model->value);

            return $this->redirect(['account/index']);
        } else {
            return $this->render('replenish', ['model' => $model, 'account' => $account]);
        }
    }

    public function actionWithdraw(int $id)
    {
        $model = new AccountWithdrawForm();
        $account = Account::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $account->withdraw($model->currencyId, $model->value);

            return $this->redirect(['account/index']);
        } else {
            return $this->render('withdraw', ['model' => $model, 'account' => $account]);
        }
    }
}
