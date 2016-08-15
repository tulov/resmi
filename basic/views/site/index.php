<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Доктора';
?>
<div class="doctor-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'last_name',
            'first_name',
            'patronymic',
            'phone',
            [
                'attribute'=>'post_id',
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Post::find()->all(),'id','post'),
                'value'=>function($data){
                    return $data->post->post;
                },
            ],
            [
                'attribute'=>'cabinet_id',
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Cabinet::find()->all(),'id','number'),
                'value'=>function($data){
                    return $data->cabinet->number;
                },
            ]
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
