<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Genero */

$this->title = 'Crear Nuevo Genero';
$this->params['breadcrumbs'][] = ['label' => 'Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genero-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,        
    ]) ?>

</div>
