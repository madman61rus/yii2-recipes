<?php

namespace common\modules\create_recipes\controllers;

use common\modules\create_recipes\models\Dishes;
use Yii;
use common\modules\create_recipes\models\Recipes;
use common\modules\create_recipes\models\RecipesSearch;
use common\modules\create_recipes\models\Ingredients;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecipesController implements the CRUD actions for Recipes model.
 */
class RecipesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Recipes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecipesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recipes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Recipes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recipes();
        $ingredients_array = Ingredients::getAllTitles();
        $dishes_array = Dishes::getAllDishes();

        if (Yii::$app->request->post()) {

            if ( ! Recipes::findOne(['dish_id' => Yii::$app->request->post()['Recipes']['dish_id']])) {

            foreach (Yii::$app->request->post()['Recipes']['ingredient_id'] as $ingredient)
            {

                $recipe = new Recipes();
                $recipe->dish_id = Yii::$app->request->post()['Recipes']['dish_id'] ;
                $recipe->ingredient_id = $ingredient;
                $recipe->save();


                }
            }

            return $this->redirect(['index']);

        }else {
            return $this->render('create', [
                'model' => $model,
                'ingredients_array' => $ingredients_array,
                'dishes_array' => $dishes_array,
            ]);
        }
    }

    /**
     * Updates an existing Recipes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ingredients_array = Ingredients::getAllTitles();
        $dishes_array = Dishes::getAllDishes();

        if (Yii::$app->request->post()) {

            $recipe = Recipes::findOne($id);
            $recipe->dish_id = Yii::$app->request->post()['Recipes']['dish_id'] ;
            $recipe->ingredient_id = Yii::$app->request->post()['Recipes']['ingredient_id'];
            $recipe->save();

            return $this->redirect(['index']);

        } else {
            return $this->render('update', [
                'model' => $model,
                'ingredients_array' => $ingredients_array,
                'dishes_array' => $dishes_array,
            ]);
        }
    }

    /**
     * Deletes an existing Recipes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recipes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recipes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recipes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
