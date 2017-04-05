<?php

namespace common\modules\create_recipes\models;

use Yii;

/**
 * This is the model class for table "recipes".
 *
 * @property integer $id
 * @property integer $dish_id
 * @property integer $ingredient_id
 *
 * @property Dishes $dish
 * @property Ingredients $ingredient
 */
class Recipes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recipes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['dish_id', 'ingredient_id'], 'required'],
            [['dish_id', 'ingredient_id'], 'integer'],
            [['dish_id', 'ingredient_id'], 'unique', 'targetAttribute' => ['dish_id', 'ingredient_id'], 'message' => 'The combination of Dish ID and Ingredient ID has already been taken.'],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dishes::className(), 'targetAttribute' => ['dish_id' => 'dish_id']],
            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::className(), 'targetAttribute' => ['ingredient_id' => 'ingredient_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'dish_id' => Yii::t('app', 'Dish ID'),
            'ingredient_id' => Yii::t('app', 'Ingredient ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dishes::className(), ['dish_id' => 'dish_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredients::className(), ['ingredient_id' => 'ingredient_id']);
    }

    /**
     * @inheritdoc
     * @return RecipesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecipesQuery(get_called_class());
    }
}
