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
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50)->notNull()->unique(),
            'passwordHash' => $this->string(255)->notNull(),
            'authKey' => $this->string(60),
            'accessToken' => $this->string(60),
            'accessLevel' => $this->integer()->defaultValue(10),
        ]);

        $command = Yii::$app->db->createCommand("INSERT INTO user(username, passwordHash, accessLevel) VALUES (:username, :passwordHash, :accessLevel) ");
        $command->bindValues([
            'username' => 'admin',
            'passwordHash' => '$2y$10$CKM5A3Ibm92ch5UJE.f42ukJbE80ZQw5mzwNLKsqZ1oHum3qcEpGG',
            'accessLevel' => 0,
        ])->execute();
        $command->bindValues([
            'username' => 'demo',
            'passwordHash' => '$2y$10$okoYW3d.l/LR4ME1hYrpZ.zq3PjK0My5AeLC1yQO1ix50NqZEuaDq',
            'accessLevel' => 6,
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
