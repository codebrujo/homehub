<?php


namespace app\controllers;


use app\models\tables\User;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        echo '<p>'.'actionIndex'.'</p>';
        $username = 'demo';
        $res = User::findOne(['username' => $username]);
        echo '<pre>';
        var_dump($res);
        echo '</pre>';
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