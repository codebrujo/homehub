<?php

namespace app\models\tables;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "rolecontroller".
 *
 * @property int $id
 * @property int $role_id
 * @property string $controllerName
 * @property string $actionName
 * @property int|null $isGranted
 */
class Rolecontroller extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rolecontroller';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id', 'controllerName', 'actionName'], 'required'],
            [['role_id', 'isGranted'], 'integer'],
            [['controllerName', 'actionName'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'controllerName' => 'Controller Name',
            'actionName' => 'Action Name',
            'isGranted' => 'Is Granted',
        ];
    }
}
