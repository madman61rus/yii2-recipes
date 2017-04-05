<?php

namespace common\modules\create_recipes\controllers;

use common\modules\create_recipes\models\Dishes;
use common\modules\create_recipes\models\Ingredients;
use common\modules\create_recipes\models\Recipes;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `create_recipes` module
 */
class MakechoiseController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $query = [];
        $model = new Ingredients();
        $ingredients = Ingredients::getAllTitles();

        // Знатно наговнокодил, но время заканчивается :(

        if (Yii::$app->request->post()){
            $ingredients_list = [] ;
             if (Yii::$app->request->post()['first']) $ingredients_list[] = Yii::$app->request->post()['first'];
            if (Yii::$app->request->post()['second']) $ingredients_list[] = Yii::$app->request->post()['second'];
            if (Yii::$app->request->post()['third']) $ingredients_list[] = Yii::$app->request->post()['third'];
            if (Yii::$app->request->post()['foorth']) $ingredients_list[] = Yii::$app->request->post()['foorth'];
            if (Yii::$app->request->post()['fifth']) $ingredients_list[] = Yii::$app->request->post()['fifth'];

            if (count($ingredients_list) < 3) {
                return $this->render('index',[
                    'model' => $model,
                    'ingredients' => $ingredients,
                    'dishes' => [],
                    'error' => 'Выберите больше 2-х ингредиентов',
                ]);
            }


            $query = Recipes::find()
                ->select([ 'recipes.dish_id , dishes.title , count(ingredients.ingredient_id) as `counter`'])
                ->from('ingredients')
                ->join('RIGHT JOIN ', Recipes::tableName(),' `ingredients`.`ingredient_id` = `recipes`.`ingredient_id` ')
                ->join('LEFT JOIN', Dishes::tableName(),'`dishes`.`dish_id` = `recipes`.`dish_id`')
                ->where(['in','`ingredients`.`ingredient_id`', $ingredients_list ])
                ->andWhere(['`dishes`.`status`' => 1])
                ->groupBy('recipes.dish_id')
                ->having('counter > 4')
                ->orderBy(['`counter`' => SORT_DESC])
                ->asArray()
                ->all();

            if (count($query)) {

                return $this->render('index',[
                    'model' => $model,
                    'ingredients' => $ingredients,
                    'dishes' => $query,
                    'error' => '',
                ]);

            }


            $query = Recipes::find()
                ->select([ 'recipes.dish_id , dishes.title , count(ingredients.ingredient_id) as `counter`'])
                ->from('ingredients')
                ->join('RIGHT JOIN ', Recipes::tableName(),' `ingredients`.`ingredient_id` = `recipes`.`ingredient_id` ')
                ->join('LEFT JOIN', Dishes::tableName(),'`dishes`.`dish_id` = `recipes`.`dish_id`')
                ->where(['in','`ingredients`.`ingredient_id`', $ingredients_list ])
                ->andWhere(['`dishes`.`status`' => 1])
                ->groupBy('recipes.dish_id')
                ->having('counter > 1')
                ->orderBy(['`counter`' => SORT_DESC])
                ->asArray()
                ->all();


        }



            return $this->render('index',[
                'model' => $model,
                'ingredients' => $ingredients,
                'dishes' => $query,
                'error' => '',
            ]);

    }


}
