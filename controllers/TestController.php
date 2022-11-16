<?php

namespace app\controllers;

use Yii;
use yii\web\HttpException;


class TestController extends \yii\rest\Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        return $behaviors;
    }

    public function actionIndex()
    {
        return $this->onSucces(['name' => 'vigihdev@gmail.com']);
    }

    public function actionError401()
    {
        return $this->onError('Test Error Message', 401);
    }

    public function actionError500()
    {
        // $model = new Bawuk();
        return $this->onError('Test Error Message', 500);
    }

    public function actionErrorexception()
    {
        // throw new NotFoundHttpException("Error Processing Request");
        throw new HttpException(502, "Error Processing Request",);
    }
}
