<?php

namespace common\modules\create_recipes\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\create_recipes\models\Recipes;

/**
 * RecipesSearch represents the model behind the search form about `common\modules\create_recipes\models\Recipes`.
 */
class RecipesSearch extends Recipes
{
    public $dish;
    public $ingredient;

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['id', 'dish_id', 'ingredient_id'], 'integer'],
            [['dish','ingredient'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Recipes::find();
        $query->joinWith(['dish','ingredient']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dish_id' => $this->dish_id,
            'ingredient_id' => $this->ingredient_id,
            'dishes.status' => 1,
        ]) ;



        return $dataProvider;
    }
}
