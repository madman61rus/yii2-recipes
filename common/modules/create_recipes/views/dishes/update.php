<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\create_recipes\models\Dishes */

$this->title = 'Update Dishes: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Блюда', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->dish_id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="dishes-update">

    <h1><?= Html::encode('Обновление блюда') ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
