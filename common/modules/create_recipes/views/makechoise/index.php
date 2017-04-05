<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\create_recipes\recipes\models\RecipesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Выбор ингредиентов');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-index">

    <h1><?= Html::encode('Выберите ингредиенты') ?></h1>


    <?= $this->render('_form', [
         'model' => $model,
        'ingredients' => $ingredients,

    ]) ?>

    <?php

    if ($error) {
        echo ('<h4>' . $error . '</h4>');
    } else {

    ?>

    <?php
        if ($dishes) { ?>
    <h2><?= Html::encode('Найденные блюда :') ?></h2>
    <ul>
            <?php
                foreach ($dishes as $dish) {
                    if ($dish['counter'] >= 2) {
                        echo('<li><h4>' . $dish['title'] . '  ( совпадающих ингредиентов - ' . $dish['counter'] . ')' . '</h4></li>');
                    }

                }
            ?>
    </ul>
     <?php    } else {

            echo('<h4>' . 'Ничего не найдено' . '</h4>');

        } }?>

