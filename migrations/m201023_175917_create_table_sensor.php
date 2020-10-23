<?php

use yii\db\Migration;

/**
 * Class m201023_175917_create_table_sensor
 */
class m201023_175917_create_table_sensor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sensor_type', [
            'id' => $this->primaryKey(),
            'typeName' => $this->string(100)->notNull(),
            'type' => $this->string(20)->notNull(),
        ]);
        $command = Yii::$app->db->createCommand("INSERT INTO sensor_type(typeName, type) VALUES (:typeName, :type) ");
        $command->bindValues([
            'typeName' => 'Information',
            'type' => 'string',
        ])->execute();
        $command->bindValues([
            'typeName' => 'Air humidity',
            'type' => 'int',
        ])->execute();
        $command->bindValues([
            'typeName' => 'Air quality',
            'type' => 'int',
        ])->execute();
        $command->bindValues([
            'typeName' => 'Light level',
            'type' => 'int',
        ])->execute();
        $command->bindValues([
            'typeName' => 'Water level',
            'type' => 'int',
        ])->execute();
        $command->bindValues([
            'typeName' => 'Ground humidity',
            'type' => 'int',
        ])->execute();
        $command->bindValues([
            'typeName' => 'Temperature',
            'type' => 'float',
        ])->execute();
        $command->bindValues([
            'typeName' => 'Pressure',
            'type' => 'float',
        ])->execute();
        $command->bindValues([
            'typeName' => 'Temperature control',
            'type' => 'int',
        ])->execute();
        $command->bindValues([
            'typeName' => 'Door sensor',
            'type' => 'boolean',
        ])->execute();
        $command->bindValues([
            'typeName' => 'Power switch',
            'type' => 'boolean',
        ])->execute();


        $this->createTable('location', [
            'id' => $this->primaryKey(),
            'locationName' => $this->string(50)->notNull(),
            'locationDescription' => $this->string(100),
            'latitude' => $this->string(20),
            'longitude' => $this->string(20),
        ]);
        $command = Yii::$app->db->createCommand("INSERT INTO location(locationName, locationDescription, latitude, longitude) VALUES (:locationName, :locationDescription, :latitude, :longitude) ");
        $command->bindValues([
            'locationName' => 'Dunai',
            'locationDescription' => 'Dunai householding',
            'latitude' => '59.965387',
            'longitude' => '30.937382',
        ])->execute();
        $command->bindValues([
            'locationName' => 'Vsevolozhsk',
            'locationDescription' => 'Vsevolozhsk, Strawberry District',
            'latitude' => '60.048364',
            'longitude' => '30.630513',
        ])->execute();

        $this->createTable('layout', [
            'id' => $this->primaryKey(),
            'layoutName' => $this->string(50)->notNull(),
            'layoutDescription' => $this->string(100),
            'locationId' => $this->integer(),
            'imagePath' => $this->string(255),
        ]);

        $this->createTable('device', [
            'id' => $this->primaryKey(),
            'deviceName' => $this->string(50)->notNull(),
            'deviceDescription' => $this->string(100),
            'layoutId' => $this->integer(),
            'handler' => $this->string(100),
        ]);
        $this->addForeignKey('fk_device_layout', 'device', 'layoutId', 'layout', 'id');

        $this->createTable('sensor', [
            'id' => $this->primaryKey(),
            'sensorInternalName' => $this->string(20)->notNull(),
            'sensorName' => $this->string(100),
            'sensorTypeId' => $this->integer()->notNull(),
            'deviceId' => $this->integer()->notNull(),
            'handler' => $this->string(100),
        ]);
        $this->addForeignKey('fk_sensor_device', 'sensor', 'deviceId', 'device', 'id');
        $this->addForeignKey('fk_sensor_sensor_type', 'sensor', 'sensorTypeId', 'sensor_type', 'id');

        $this->createTable('user_layout', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull(),
            'layoutId' => $this->integer()->notNull(),
            'accessLevel' => $this->integer()->defaultValue(10),
        ]);
        $this->addForeignKey('fk_user_layout_user', 'user_layout', 'userId', 'user', 'id');
        $this->addForeignKey('fk_user_layout_layout', 'user_layout', 'layoutId', 'layout', 'id');

        $this->createTable('user_location', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull(),
            'locationId' => $this->integer()->notNull(),
            'accessLevel' => $this->integer()->defaultValue(10),
        ]);
        $this->addForeignKey('fk_user_location_user', 'user_location', 'userId', 'user', 'id');
        $this->addForeignKey('fk_user_location_location', 'user_location', 'locationId', 'location', 'id');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_layout');
        $this->dropTable('user_location');
        $this->dropTable('sensor');
        $this->dropTable('device');
        $this->dropTable('layout');
        $this->dropTable('location');
        $this->dropTable('sensor_type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201023_175917_create_table_sensor cannot be reverted.\n";

        return false;
    }
    */
}
