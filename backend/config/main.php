<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'administrator' => [
            'class' => 'dimple\administrator\Module',
            //'enableConfirmation'=>false,
            // 'enableRegistration'=>false,
            // 'enableConfirmation'=>false
        ],
    ],
    'components' => [
        'as globalAccess'=>[
            'class'=>'\dimple\administrator\behaviors\GlobalAccessBehavior',
            'rules'=>[
                'controllers'=>['system-log','system-login'],
                'allow' => true,
                'roles' => ['Admin'],
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\ApcCache',
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/yii2/dimple-cms/frontend/web',
            'scriptUrl'=>'/yii2/dimple-cms/frontend/web/index.php',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'user' => [
            'class'=>'yii\web\User',
            'identityClass' => 'dimple\administrator\models\User',
            'enableAutoLogin' => true,
            'loginUrl'=>['/administrator/authen/signin'],
            'as afterLogin' => 'dimple\administrator\behaviors\LoginTimestampBehavior'
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
