<?php

//定义默认调用index控制器的index方法
$controller_name = 'index';
$method_name = 'index';

//定义路由函数，第一部分作为控制器的名字，第二部分作为控制器的方法
function route_request(){
	global $controller_name,$method_name;
	$uri = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
	$uri = trim($uri,'/');
	$uri_arr = explode('/',$uri);
	if(count($uri_arr) >= 2 ) {
		$controller_name = $uri_arr[0];
		$method_name = $uri_arr[1];
	}
	$method_name .= '_action';
	return;
}

#先定义回调函数
function my_autoload_register($class){
	if(file_exists('lib/'.$class.'.class.php')) {
		include 'lib/' . $class  . '.class.php';
		return true;
	}
	if(file_exists('models/'.$class.'.class.php')) {
		include 'models/' . $class  . '.class.php';
		return true;
	}
	if(file_exists('actions/'.$class.'.class.php')) {
		include 'actions/' . $class  . '.class.php';
		return true;
	}
}

//自动加载
spl_autoload_register('my_autoload_register');
route_request();

$controller = new $controller_name();
$controller->$method_name();

