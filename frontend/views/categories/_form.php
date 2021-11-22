<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= FileUpload::widget([
        'model' => $model,
        'attribute' => 'image',
        'url' => ['media/upload', 'id' => $model->id], 
    ]); ?>

    <?= $form->field($model, 'parent_id')->dropDownList($items) ?>

    <?= $form->field($model, 'status')->radioList([1 => 'Hiển thị', -1 => 'Không sử dụng']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
