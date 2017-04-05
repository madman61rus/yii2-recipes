<?php

namespace common\modules\create_recipes\models;

use Yii;

/**
 * This is the model class for table "dishes".
 *
 * @property integer $dish_id
 * @property string $title
 * @property integer $status
 *
 * @property Recipes[] $recipes
 * @property Ingredients[] $ingredients
 */
class Dishes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dishes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dish_id' => Yii::t('app', 'Dish ID'),
            'title' => Yii::t('app', 'Title'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipes::className(), ['dish_id' => 'dish_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredients::className(), ['ingredient_id' => 'ingredient_id'])->viaTable('recipes', ['dish_id' => 'dish_id']);
    }

    /**
     * @inheritdoc
     * @return DishesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DishesQuery(get_called_class());
    }

    public static function getAllDishes() {

        $result = [];
        $query = static::findAll(['status' => 1]);

        foreach ($query as $request) {
            $result[$request['dish_id']] = $request['title'];
        }

        return $result;
    }

    public static function getCountHiddenIngredients($id){

        $counter = 0;

        $all_ingredients = Recipes::findAll(['dish_id' => $id]);

        foreach ($all_ingredients as $ingredients) {
            if (Ingredients::findOne(['ingredient_id' => $ingredients['ingredient_id']])['status'] == 0) {
                $counter++;
            }
        }

        return $counter;
    }
}
