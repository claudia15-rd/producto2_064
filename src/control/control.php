<?php
$url=$_SERVER ["REQUEST_URI"];
$request_file="/var/www/html/controllers".strtolower($url).".php"; 
$ruta_actual = __DIR__;
if(file_exists($request_file)){
	//si el usuario esta registrado
	//le permitimos acceder
	require $request_file;
	//else 
	// error 404; o redirige al login
}else{
	header("Location: /login");
}

?>
