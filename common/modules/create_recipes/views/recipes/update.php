<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\create_recipes\models\Recipes */

$this->title = 'Обновление рецепта: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Рецепты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="recipes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update', [
        'model' => $model,
        'ingredients_array' => $ingredients_array,
        'dishes_array' => $dishes_array,
    ]) ?>

</div>
