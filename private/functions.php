<?php

function url($path){
	global $CONFIG;

	return $CONFIG['BASE_URL'] . $path;
}

function view($name, $_template_vars = []){

	global $CONFIG;

	foreach($_template_vars as $key => $value){
		${$key} = $value;
	}
	unset($key, $value, $_template_vars);

	$view_filename = $CONFIG['VIEWS_PATH'] . '/' . $name . '.php';

	if(!file_exists($view_filename)){
		echo "View not found: $view_filename";
		exit;
	}

	include $CONFIG['VIEWS_PATH'] . '/_header.php';
	include $view_filename;
	include $CONFIG['VIEWS_PATH'] . '/_footer.php';

}