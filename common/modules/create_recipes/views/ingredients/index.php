<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\create_recipes\models\IngredientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ингредиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredients-index">

    <h1><?= Html::encode('Ингредиенты') ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать ингредиент', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ingredient_id',
            'title',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
