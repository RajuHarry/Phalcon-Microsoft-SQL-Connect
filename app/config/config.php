<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'     => 'Twm\Db\Adapter\Pdo\Mssql',		 // Check file loader.php
		'host'		=> 'localhost',                          // Server localhost if SQL on same server else use IP address of remote Server  
		'username'	=> 'sa',                                 // Defult Username here
		'password'	=> 'RajuharryPhoenixpeth',               // Change Password here
		'dbname'	=> 'phalcon_test',                       // Database name
		'pdoType'       => 'sqlsrv',                         // Don't change it 
		'dialectClass'	=> 'Twm\Db\Dialect\Mssql'	         // Check file loader.php
	),
	'application' => array(
		'controllersDir' => __DIR__ . '/../../app/controllers/',
		'modelsDir'      => __DIR__ . '/../../app/models/',
		'viewsDir'       => __DIR__ . '/../../app/views/',
		'pluginsDir'     => __DIR__ . '/../../app/plugins/',
		'libraryDir'     => __DIR__ . '/../../app/library/',
		'cacheDir'       => __DIR__ . '/../../app/cache/',
		'baseUri'        => '/Phalcon-Microsoft-SQL-Connect/',
	)
));
