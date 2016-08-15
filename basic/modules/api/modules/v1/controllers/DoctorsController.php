<?php

namespace app\modules\api\modules\v1\controllers;

use app\modules\api\modules\common\components\Auth;
use app\modules\api\modules\v1\models\Action;
use app\modules\api\modules\v1\models\Offer;
use app\modules\api\modules\v1\models\Users;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class DoctorsController extends ActiveController
{
    public $modelClass = 'app\modules\api\modules\v1\models\Doctor';
    /*public function checkAccess($action, $model = null, $params = []){
        if(\Yii::$app->user->isGuest)
            throw new ForbiddenHttpException;
    }*/

}
