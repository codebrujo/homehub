<?php


namespace app\models;


use Yii;
use yii\base\Model;

class RoleController extends Model
{
    public static function userHasAccess($controller, $action){
        if(is_null($controller) || is_null($action)){
            return false;
        }
        $role = 100;

        if (!Yii::$app->user->isGuest) {
            $role = Yii::$app->user->getIdentity()->accessLevel;
        }

        $res = tables\Rolecontroller::find()
            ->select('isGranted')
            ->where(['=','controllerName',$controller])
            ->andWhere(['=','actionName',$action])
            ->andWhere(['>=','role_id',$role])
            ->limit(1)
            ->one();
        return is_null($res) ? false : true;

    }
}