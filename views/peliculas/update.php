<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Peliculas */

$this->title = 'Actualizar Película: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peliculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peliculas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'genero' => $genero,
        'msg' => $msg,
        'modelupl' => $modelupl,
        
    ]) ?>

</div>
