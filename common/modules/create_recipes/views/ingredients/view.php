<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\create_recipes\models\Ingredients */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ингредиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredients-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->ingredient_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->ingredient_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить ингредиент ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ingredient_id',
            'title',
            'status',
        ],
    ]) ?>

</div>
