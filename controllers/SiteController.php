<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }
}
