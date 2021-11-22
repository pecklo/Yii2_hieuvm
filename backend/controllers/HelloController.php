<?php


namespace backend\controllers;


class HelloController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}