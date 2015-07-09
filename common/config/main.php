<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name'=>'DIMPLE-CMS',
    'aliases'=>[
       //'@dimple/settings' => '@backend/runtime/tmp-extensions/yii2-settings',
       '@dimple/administrator' => '@backend/runtime/tmp-extensions/yii2-administrator',
       '@dimple/notify' =>'@backend/runtime/tmp-extensions/yii2-bootstrap-notify'
    ],
    'components' => [
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['user'],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
               'db' => [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'prefix'=>function () {
                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                        $user = Yii::$app->has('user', true) ? Yii::$app->get('user') : null;
                        $userID = $user ? $user->getId(false) : '-';
                        $ip = Yii::$app->request->getUserIP();
                        $agent = Yii::$app->request->getUserAgent();
                        return sprintf('[%s][%s][%s][%s][%s]',Yii::$app->id, $url,$ip,$userID,$agent);
                    },
                    'logTable'=>'{{%system_log}}'
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                'login' => '/user/security/login',
                'logout' => 'user/security/logout', 
                'register' => 'user/registration/register', 
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules'=>[
	    'user' => [
	        'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
	    ],
    ]
];
