<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
      'urlManager' => [
             'class' => 'yii\web\urlManager',
             'enablePrettyUrl' => false,
             'showScriptName' => true,
        ],
      'urlManagerBackend' => [
               'class' => 'yii\web\urlManager',
               //'baseUrl' => '/projectName/backend/web',
               //'scriptUrl'=>'/projectName/backend/web/index.php',
               'baseUrl' => '../../../computer2/backend/web',
               'scriptUrl'=>'../../../computer2/backend/web/index.php',
               'enablePrettyUrl' => false,
               'showScriptName' => true,
        ],
    ],
    'modules' => 	[
						'gridview' => [
							'class' => 'kartik\grid\Module',
						],
						'datecontrol' =>  [
							'class' => 'kartik\datecontrol\Module',
							// format settings for displaying each date attribute
							'displaySettings' => [
								'date' => 'd-m-Y',
								'time' => 'H:i:s A',
								'datetime' => 'd-m-Y H:i:s A',
							],
							// format settings for saving each date attribute
							'saveSettings' => [
								'date' => 'Y-m-d',
								'time' => 'H:i:s',
								'datetime' => 'Y-m-d H:i:s',
							],
							// automatically use kartik\widgets for each of the above formats
							'autoWidget' => true,

						],
					],
    'params' => $params,
];
