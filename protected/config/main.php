<?php
require('config_local.php');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// Define a path alias for the Bootstrap extension as it's used internally.
// In this example we assume that you unzipped the extension under protected/extensions.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');


// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Estación de evaluación y mejora - HSS',

    'sourceLanguage'=>'en',
    'language'=>'es',
    'timezone'=>'America/Santiago',

	// preloading 'log' component
    'preload'=>$preload,

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'ext.giix-components.*', // giix components
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
				'ext.select2.ESelect2',

        'application.extensions.yii-mail.YiiMailMessage',       
	),

    'theme'=>'bootstrap', // requires you to copy the theme under your themes directory

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'cfconmutador',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','hss.selfishness.cl','54.152.244.57'),
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
                'bootstrap.gii', // bootstrap generators
            ),
		),

        'user'=>array(
            'tableUsers' => 'user',
            'tableProfiles' => 'profile',
            'tableProfileFields' => 'profile_field',
            # encrypting method (php hash function)
            'hash' => 'md5',
            'sendActivationMail' => false,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => true,
            # automatically login from registration
            'autoLogin' => true,
            'registrationUrl' => array('/user/registration'),
            'recoveryUrl' => array('/user/recovery'),
            'loginUrl' => array('/user/login'),
            # page after login
            'returnUrl' => array('/user/profile'),
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
            'profileRelations'=>array(
                'company'=>array(CActiveRecord::BELONGS_TO, 'Company', 'company_id'),
                'occupation'=>array(CActiveRecord::BELONGS_TO, 'Occupation', 'occupation_id'),
                'occupation_area'=>array(CActiveRecord::BELONGS_TO, 'OccupationArea', 'occupation_area_id'),
            ),
        ),
        'rights'=>array(
            //'install'=>true,
        ),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            'class' => 'RWebUser',
            'loginUrl'=>array('/user/login'),
		),
        'authManager'=>array(
            'class'=>'RDbAuthManager',
            'connectionID'=>'db',
            'defaultRoles'=>array('Authenticated', 'Guest'),
            'assignmentTable' => 'authassignment',
            'itemTable' => 'authitem',
            'itemChildTable' => 'authitemchild',
            'rightsTable' => 'rights',
        ),
        'mail'=>array(
            'class'=>'ext.yii-mail.YiiMail',
        ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database

        'db'=>array(
            'connectionString' => 'mysql:host='.$dbhost.';dbname='.$dbname,
            'emulatePrepare' => true,
            'username' => $dbuser,
            'password' => $dbpass,
            'charset' => 'utf8',
            //'enableProfiling'=>TRUE,
        ),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
                /*array(
                    'class'=>'CProfileLogRoute',
                    'report'=>'summary',
                    // lists execution time of every marked code block
                    // report can also be set to callstack
                ),	*/
			),
		),

        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
            'responsiveCss'=>true,
        ),

        'less'=>array(
            //'class'=>'ext.less.components.LessCompiler',
            'paths'=>array(
                //'themes/bootstrap/less/site.less' => 'themes/bootstrap/css/site.min.css',
                //'themes/totem/less/totem.less' => 'themes/totem/css/totem.min.css',
                

                /*'protected/extensions/bootstrap/assets/less/bootstrap.less' => 'protected/extensions/bootstrap/assets/css/bootstrap.min.css',
                'protected/extensions/bootstrap/assets/less/responsive.less' => 'protected/extensions/bootstrap/assets/css/bootstrap-responsive.min.css',*/
            ),
        ),

        /*'clientScript'=>array(
            'class'=>'ext.minScript.components.ExtMinScript',
            //'optionName'=>'optionValue',
        ),*/
	),

    /*'controllerMap'=>array(
        'min'=>array(
            'class'=>'ext.minScript.controllers.ExtMinScriptController',
            //'optionName'=>'optionValue',
        ),
    ),*/

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'info@selfishness.cl',
	),
);
