<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ingredients`.
 */
class m170404_075624_create_ingredients_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ingredients', [
            'ingredient_id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'status' => $this->boolean()->defaultValue(true),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ingredients');
    }
}
