<?php
require "config.php";

/*echo "<p>$url</p>";*/

switch($url){
  case '/':
    require 'controller/main.php';
    break;
  case '/productos':
    require 'controller/producto.php';
    break;
  case '/adminProducto':
    require 'controller/adminProducto.php';
    break;
  case '/prueba':
    echo "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    break;
  default:
    echo "<h1>404</h1>";
    break;
}
