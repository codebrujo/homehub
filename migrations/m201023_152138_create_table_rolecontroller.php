<?php

use yii\db\Migration;

/**
 * Class m201023_152138_create_table_rolecontroller
 */
class m201023_152138_create_table_rolecontroller extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\db\Exception
     */
    public function safeUp()
    {
        $this->createTable('rolecontroller', [
            'id' => $this->primaryKey(),
            'role_id' => $this->integer()->notNull(),
            'controllerName' => $this->string(100)->notNull(),
            'actionName' => $this->string(100)->notNull(),
            'isGranted' => $this->boolean()->defaultValue(true),
        ]);

        $command = Yii::$app->db->createCommand("INSERT INTO rolecontroller(role_id, controllerName, actionName, isGranted) VALUES (:role_id, :controllerName, :actionName, :isGranted) ");
        $command->bindValues([
            'role_id' => '100',
            'controllerName' => 'Site',
            'actionName' => 'Index',
            'isGranted' => true,
        ])->execute();
        $command->bindValues([
            'role_id' => '100',
            'controllerName' => 'Site',
            'actionName' => 'Login',
            'isGranted' => true,
        ])->execute();
        $command->bindValues([
            'role_id' => '100',
            'controllerName' => 'Site',
            'actionName' => 'Logout',
            'isGranted' => true,
        ])->execute();
        $command->bindValues([
            'role_id' => '100',
            'controllerName' => 'Site',
            'actionName' => 'Contact',
            'isGranted' => true,
        ])->execute();
        $command->bindValues([
            'role_id' => '100',
            'controllerName' => 'Site',
            'actionName' => 'About',
            'isGranted' => true,
        ])->execute();
        $command->bindValues([
            'role_id' => '10',
            'controllerName' => 'Site',
            'actionName' => 'Architecture',
            'isGranted' => true,
        ])->execute();
        $command->bindValues([
            'role_id' => '10',
            'controllerName' => 'Site',
            'actionName' => 'ApiDescription',
            'isGranted' => true,
        ])->execute();
        $command->bindValues([
            'role_id' => '10',
            'controllerName' => 'Site',
            'actionName' => 'Visualisation',
            'isGranted' => true,
        ])->execute();


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('rolecontroller');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201023_152138_create_table_rolecontroller cannot be reverted.\n";

        return false;
    }
    */
}
