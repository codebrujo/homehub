<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $passwordHash
 * @property string|null $authKey
 * @property string|null $accessToken
 * @property int|null $accessLevel
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'passwordHash'], 'required'],
            [['accessLevel'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['passwordHash'], 'string', 'max' => 255],
            [['authKey', 'accessToken'], 'string', 'max' => 60],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'passwordHash' => 'Password Hash',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'accessLevel' => 'Access Level',
        ];
    }



}
