<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Doctor */

$this->title = 'Новый доктор';
$this->params['breadcrumbs'][] = ['label' => 'Доктора', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
