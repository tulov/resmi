<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
\app\modules\admin\assets\DoctorIndexAsset::register($this);
$this->title = 'Доктора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новый доктор', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
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
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                            \yii\helpers\Url::to('/index.php/v1/doctors/'.$model->id),
                            [
                            'title' => Yii::t('yii', 'Delete'),
                                'class'=>'delete-link'
                        ]);
                    }
                ],
                'template'=>'{update}{delete}'
            ],
        ],
    ]); ?>
</div>
