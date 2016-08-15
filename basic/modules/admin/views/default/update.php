<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */

$this->title = 'Обновление доктора: ' . $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Доктора', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
