<?php 

spl_autoload_register(function($class) {
	$dir	= '../app/Core/';
	$file 	= $class . '.php';
	require_once $dir . $file ;
	});

require_once '../app/Config/Config.php';