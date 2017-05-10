<?php

// Creates the autoloader
$loader = new \Phalcon\Loader();

$loader->registerDirs(
	array('models/')
);

//Register some namespaces
$loader->registerNamespaces(
		array(
			"Twm\Db\Adapter\Pdo"    => "adapter/",
			"Twm\Db\Dialect"    => "dialect/"
			)
		);

// register autoloader
$loader->register();

echo '<h1>connect</h1>';
$mc = array(
		'host'		=> 'localhost',
		'username'	=> 'sa',
		'password'	=> 'Rajuharry#Phoenix@Jhonny12345',
		'dbname'	=> 'phalcon_test',
		'dialectClass'	=> '\Twm\Db\Dialect\Mssql'	

	);
$ec = array(
		'host'		=> 'localhost',
		'username'	=> 'sa',
		'password'	=> 'Rajuharry#Phoenix@Jhonny12345',
		'dbname'	=> 'phalcon_test',
		'dialectClass'	=> '\Twm\Db\Dialect\Mssql'	
	);
$db = new \Twm\Db\Adapter\Pdo\Mssql($mc); 
if (!$db->connect()){
	$db->close();
	die('connection failed');
}

//testModel($db);
testQueryBinding($db);

function testModel($db){
	$boutique = new Boutique();
}

function testQueryBinding($db){
	echo '<h1>execute query</h1>';
	$sqlStatement = "select * from tb_a_boutique_data where 1=':aaa' and 2=':bbb'";
	$bindParams = array(':aaa'=>'1',':bbb'=>'2');

	var_dump($db->query($sqlStatement, $bindParams));
}

function testDescribeColumns(){
	var_dump($db->describeColumns('tb_a_frist_data'));
}
