<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\create_recipes\models\Ingredients */

$this->title = 'Обновить ингредиент: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ингредиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->ingredient_id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="ingredients-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
