<?php

namespace common\modules\create_recipes\controllers;

use common\modules\create_recipes\models\Dishes;
use Yii;
use common\modules\create_recipes\models\Ingredients;
use common\modules\create_recipes\models\Recipes;
use common\modules\create_recipes\models\IngredientsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IngredientsController implements the CRUD actions for Ingredients model.
 */
class IngredientsController extends Controller
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
     * Lists all Ingredients models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IngredientsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ingredients model.
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
     * Creates a new Ingredients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ingredients();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ingredient_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ingredients model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $status = Yii::$app->request->post()['Ingredients']['status'];

            $dishes_ids_to_change = Recipes::findAll(['ingredient_id' => $id]);

            if (! $status) {
                foreach ($dishes_ids_to_change as $recipe) {
                    $dish = Dishes::findOne($recipe->dish_id);
                    $dish['status'] = 0;
                    $dish->save();
                }
            }else {
                foreach ($dishes_ids_to_change as $recipe) {
                    $dish = Dishes::findOne($recipe->dish_id);
                    if (Dishes::getCountHiddenIngredients($recipe->dish_id) == 0) {
                        $dish['status'] = 1;
                        $dish->save();
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->ingredient_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ingredients model.
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
     * Finds the Ingredients model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ingredients the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ingredients::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
