<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m201021_173143_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\db\Exception
     */
    public function safeUp()
    {
        $credentials = require __DIR__ . '/../config/credentials.php';
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50)->notNull()->unique(),
            'passwordHash' => $this->string(255)->notNull(),
            'authKey' => $this->string(60),
            'accessToken' => $this->string(120),
            'accessLevel' => $this->integer()->defaultValue(10),
        ]);
        //accessLevel:
        //0 - sa
        //1 - location admin
        //3 - location power user
        //5 - location user
        //7 - device
        //9 - demo
        $command = Yii::$app->db->createCommand("INSERT INTO user(username, passwordHash, authKey, accessToken, accessLevel) VALUES (:username, :passwordHash, :authKey, :accessToken, :accessLevel) ");
        $command->bindValues([
            'username' => 'admin',
            'passwordHash' => $credentials['PasswordHash']['admin'],
            'authKey' => $credentials['AuthKey']['admin'],
            'accessToken' => $credentials['AccessToken']['admin'],
            'accessLevel' => 0,
        ])->execute();
        $command->bindValues([
            'username' => 'demo',
            'passwordHash' => $credentials['PasswordHash']['demo'],
            'authKey' => $credentials['AuthKey']['demo'],
            'accessToken' => $credentials['AccessToken']['demo'],
            'accessLevel' => 9,
        ])->execute();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
