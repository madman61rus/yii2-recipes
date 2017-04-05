<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\recipes\models\Recipes */

$this->title = Yii::t('app', 'Создать рецепт');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Рецепты'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-create">


    <h1><?= Html::encode('Создание рецепта') ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'ingredients_array' => $ingredients_array,
        'dishes_array' => $dishes_array,
    ]) ?>

</div>
