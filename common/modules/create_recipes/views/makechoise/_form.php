
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\recipes\models\Recipes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div><?= Html::dropDownList('first', 0,$ingredients ,
            ['class' => 'selectpicker','prompt' => 'Выберите ингредиент']); ?></div><br/>
    <div><?= Html::dropDownList('second', 0,$ingredients,
        ['class' => 'selectpicker','prompt' => 'Выберите ингредиент']); ?></div><br/>
    <div><?= Html::dropDownList('third', 0,$ingredients ,
            ['class' => 'selectpicker','prompt' => 'Выберите ингредиент']); ?></div><br/>
    <div><?= Html::dropDownList('foorth', 0,$ingredients ,
            ['class' => 'selectpicker','prompt' => 'Выберите ингредиент']); ?></div><br/>
    <div><?= Html::dropDownList('fifth', 0,$ingredients ,
            ['class' => 'selectpicker','prompt' => 'Выберите ингредиент']); ?></div><br/>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Вывести блюда') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>