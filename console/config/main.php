<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'rbac' => [
            //'class' => 'dimple\administrator\console\controllers\RbacController'
            'class' => 'dimple\administrator\rbac\RbacController'
        ],
    ],
    'components' => [
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
               'db' => [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    //'except'=>['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                    'prefix'=>function () {
                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                        $user = Yii::$app->has('user', true) ? Yii::$app->get('user') : null;
                        $userID = $user ? $user->getId(false) : '-';
                        $ip = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUserIP() : null;
                        $agent = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUserAgent() : null;
                        return sprintf('[%s][%s][%s][%s][%s]',$ip,Yii::$app->id, $url,$userID,$agent);
                    },
                    'logVars'=>[],
                    'logTable'=>'{{%system_log}}'
                ],
            ],
        ],
    ],
    'params' => $params,
];
