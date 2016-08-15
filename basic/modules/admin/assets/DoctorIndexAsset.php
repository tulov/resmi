<?php
/**
 * Created by PhpStorm.
 * User: lex
 * Date: 08.08.2016
 * Time: 13:18
 */

namespace app\modules\admin\assets;


use yii\web\AssetBundle;

class DoctorIndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [
        'js/doctor.index.js'
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}