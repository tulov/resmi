<?php

namespace app\modules\api\modules\v1;

class v1 extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\api\modules\v1\controllers';

    public function init()
    {
        parent::init();
        $user=\Yii::$app->user;
        $user->loginUrl=null;
    }
}
