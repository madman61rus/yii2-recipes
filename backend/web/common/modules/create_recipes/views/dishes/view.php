<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\create_recipes\models\Dishes */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dishes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dish_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dish_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dish_id',
            'title',
            'status',
        ],
    ]) ?>

</div>
