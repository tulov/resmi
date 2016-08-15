<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
\app\modules\admin\assets\DoctorFormAsset::register($this);
?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin(['action'=>\yii\helpers\Url::to(['/v1/doctors' . ($model->id ? '/'.$model->id : '')])]); ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cabinet_id')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Cabinet::find()->all(),'id','number'),
            ['prompt'=>'--Выберите кабинет--']) ?>

    <?= $form->field($model, 'post_id')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Post::find()->all(),'id','post'),
            ['prompt'=>'--Выберите должность--']) ?>

    <div class="form-group">
        <?= Html::a($model->isNewRecord ? 'Создать' : 'Обновить','javascript:void(0)', [
            'class' => $model->isNewRecord ? 'btn btn-success btn-new' : 'btn btn-primary btn-edit',
            'id'=>'submitBtn'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
