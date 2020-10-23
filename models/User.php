<?php

namespace app\models;

use yii\base\BaseObject;
use yii\web\IdentityInterface;

class User extends BaseObject implements IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $passwordHash;
    public $authKey;
    public $accessToken;
    public $accessLevel;


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $activeUser = tables\User::findOne($id);
        return is_null($activeUser) ? null : new static($activeUser);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $activeUser = tables\User::findOne(['accessToken' => $token]);
        return is_null($activeUser) ? null : new static($activeUser);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $activeUser = tables\User::findOne(['username' => $username]);
        return is_null($activeUser) ? null : new static($activeUser);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return password_verify($password, $this->passwordHash);
    }
}
