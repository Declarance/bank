<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\Currency;
use app\models\forms\CurrencyForm;
use app\models\forms\CurrencyRateForm;
use yii\web\Controller;
use Yii;
use yii\web\Response;

class CurrencyController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index', ['currencies' => Currency::find()->all()]);
    }

    public function actionCreate(): Response|string
    {
        $model = new CurrencyForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $currency = new Currency();
            $currency->name = $model->name;
            $currency->save();

            return $this->redirect(['currency/index']);
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    public function actionDelete(int $id): Response
    {
        $model = Currency::findOne($id);
        $model->delete();

        return $this->redirect(['currency/index']);
    }

    public function actionRate(int $id): Response|string
    {
        $model = new CurrencyRateForm();
        $currency = Currency::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $currency->exchangeWeight = (Currency::findOne($model->toCurrencyId))->exchangeWeight * $model->rate;
            $currency->save();

            return $this->redirect(['currency/index']);
        } else {
            return $this->render('rate', ['model' => $model, 'currency' => $currency]);
        }
    }
}
