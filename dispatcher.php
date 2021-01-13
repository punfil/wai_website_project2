<?php
const REDIRECT_PREFIX = 'redirect:';

function build_response($view, $model){
	if (strpos($view, REDIRECT_PREFIX) === 0){	
		$url = substr($view, strlen(REDIRECT_PREFIX));
		header("Location: " . $url);
		exit();
	}
	else{
		render($view, $model);
	}
}

function render($view_name, $model){
	extract($model);
	include 'views/'.$view_name.'.php';
}

function dispatch($routing, $action_url){
	$model = [];
	if(!array_key_exists($action_url, $routing)){
		http_response_code(404);
		$action_url = "/error";
	}	
	$controller_name = $routing[$action_url];


	$view_name = $controller_name($model);

	build_response($view_name, $model);
}

?>