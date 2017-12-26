<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;



/* @var $this yii\web\View */
/* @var $model app\models\Peliculas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peliculas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_genero')->dropDownList($genero, ['prompt'=>'Seleccionar...'])->label('Genero'); ?>

    <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'fecha_lanzamiento')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Seleccione la Fecha de lanzamiento...'],
        'pluginOptions' => [
            'todayHighlight' => true,
            'autoclose'=>true,
            'format' => 'yyyy-m-dd'
        ]
    ]);
    ?>
    <?= $msg ?>
    <?= $form->field($modelupl, "file[]")->fileInput(['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
