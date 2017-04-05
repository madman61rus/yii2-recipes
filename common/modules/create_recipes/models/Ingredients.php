<?php

namespace common\modules\create_recipes\models;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property integer $ingredient_id
 * @property string $title
 * @property integer $status
 *
 * @property Recipes[] $recipes
 * @property Dishes[] $dishes
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingredients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
            'ingredient_id' => Yii::t('app', 'Ingredient ID'),
            'title' => Yii::t('app', 'Title'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipes::className(), ['ingredient_id' => 'ingredient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishes()
    {
        return $this->hasMany(Dishes::className(), ['dish_id' => 'dish_id'])->viaTable('recipes', ['ingredient_id' => 'ingredient_id']);
    }

    /**
     * @inheritdoc
     * @return ingredientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ingredientsQuery(get_called_class());
    }

    public static function getAllTitles()
    {
        $query =  static::find()->asArray()->all();
        $result = [];
        foreach ($query as $responce) {
            $result[$responce['ingredient_id']] = $responce['title'];
        }

        return $result;

    }

}
