<?php


namespace app\controllers;


use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        echo 'actionIndex';
        exit;
    }
    public function actionIotpoint()
    {

        echo "Оптимальная стоимость: ";
        exit;
    }
    public function actionCheckperformance()
    {
        $timeTarget = 0.05; // 50 миллисекунд.
        $cost = 8;
        do {
            $cost++;
            $start = microtime(true);
            password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
            $end = microtime(true);
        } while (($end - $start) < $timeTarget);

        echo "Оптимальная стоимость: " . $cost;
        exit;
    }

}