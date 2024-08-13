<?php
$request_URL = $_SERVER['REQUEST_URI'];
$folderPath = dirname($_SERVER['SCRIPT_NAME']);

if(isset($_SERVER['QUERY_STRING'])){
  $directorio = $_SERVER['QUERY_STRING'];
  $request_URL = str_replace("?".$directorio,"",$request_URL);
}

$url = substr($request_URL, strlen($folderPath));

/*echo "<p>$url</p>";*/

switch($url){
  case '/':
    require 'routes/main.php';
    break;
  case '/productos':
    require 'routes/producto.php';
    break;
  case '/adminProducto':
    require 'routes/adminProducto.php';
    break;
  case '/prueba':
    echo "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    break;
  default:
    echo "<h1>404</h1>";
    break;
}
