<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

require_once( dirname(__FILE__) . '/../components/numero_venta.php');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('booster', dirname(__FILE__).'/../extensions/yii');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Sistema de Control y Gestión de Inventario',
        //'theme'=>"missfrog",//agregado 08/07/2015
        'theme'=>'bootstrap',
	// preloading 'log' component
	'preload'=>array('log'),
        
        'aliases' => array(        
            'yiistrap' => realpath(__DIR__ . '/../extensions/yiistrap'), // change this if necessary
            'bootstrap' => realpath(__DIR__.'/../extensions/bootstrap'),
        ),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.extensions.awegen.components.*',
                'application.extensions.phpexcel.Classes.PHPExcel',
                'ext.bootstrap-theme.widgets.*',
                'ext.bootstrap-theme.helpers.*',
                'ext.bootstrap-theme.behaviors.*',
                'ext.multimodelform.MultiModelForm.*',
                'ext.AweCrud.components.*',
            //YII
                'yiistrap.behaviors.*',
                'yiistrap.components.*',
                'yiistrap.form.*',
                'yiistrap.helpers.*',
                'yiistrap.widgets.*',
                'ext.yiiext.behaviors.activerecord-relation.EActiveRecordRelationBehavior.*',
            //BOOTSTRAP
                'bootstrap.widgets.*',
                'bootstrap.form.*',
                'bootstrap.components.*',
                
                
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
                        'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths' => array(
                            'ext.awegen',
                            'ext.AweCrud.generators',
                            'ext.bootstrap-theme.gii',
                            'bootstrap.gii',
                            'booster.gii',
                            'yiistrap.gii',
                        ),
		),
		
	),

	// application components
	'components'=>array(
                 'widgetFactory' => array(
                    'widgets' => array(
                        'CJuiAutoComplete' => array(
                            'themeUrl' => '/css/jqueryui',
                            'theme' => 'tema',
                        ),
                        
                        
                        
                        'CJuiDialog' => array(
                            'themeUrl' => '/css/jqueryui',
                            'theme' => 'tema',
                        ),
                        'CJuiDatePicker' => array(
                            'themeUrl' => '/css/jqueryui',
                            'theme' => 'tema',
                        ),
                        'booster' => array(
                            'class' => 'booster.components.Booster',
                        ),
                        'bootstrap'=>array(
                        'class'=>'bootstrap.components.Bootstrap',
                        ),
                        'bootstrap' => array(
                        'class' => 'yiistrap.components.TbApi',   
                        ),
                    ),
                ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
                

		// uncomment the following to enable URLs in path-format
	
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>true,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                                
			),
		),
	

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),
                /*'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=peruvianprueba;charset=utf8',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',*/
		
		

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
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
