<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\recipes\models\Recipes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dish_id')->dropDownList($dishes_array, ['value' => $model->dish_id]) ?>

    <?= $form->field($model, 'ingredient_id')->dropDownList($ingredients_array,
        ['value' => $model->ingredient_id ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
