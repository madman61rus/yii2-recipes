<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dishes`.
 */
class m170404_075636_create_dishes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dishes', [
            'dish_id' => $this->primaryKey(),
            'title' => $this->string()->unique()->unique(),
            'status' => $this->boolean()->defaultValue(true),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dishes');
    }
}
