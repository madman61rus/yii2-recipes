<?php

use yii\db\Migration;

/**
 * Handles the creation of table `recipes`.
 */
class m170404_075650_create_recipes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%recipes}}', [
            'id' => $this->primaryKey(),
            'dish_id' => $this->integer()->notNull(),
            'ingredient_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('dishes_id', '{{%recipes}}','dish_id', 'dishes','dish_id');
        $this->addForeignKey('ingredients_id','{{%recipes}}', 'ingredient_id', 'ingredients' , 'ingredient_id');

        $this->createIndex('pair','recipes',['dish_id','ingredient_id'],true);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('recipes');
    }
}
