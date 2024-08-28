<?php

$request_URL = $_SERVER['REQUEST_URI'];
$folderPath = dirname($_SERVER['SCRIPT_NAME']);

if(isset($_SERVER['QUERY_STRING'])){
  $directorio = $_SERVER['QUERY_STRING'];
  $request_URL = str_replace("?".$directorio,"",$request_URL);
}

$url = substr($request_URL, strlen($folderPath));

$parsedUrl = parse_url($url);
$path = $parsedUrl['path'];
$pathParts = explode('/', $path);

# echo count($pathParts);

$productsIndex = array_search('productos', $pathParts);

if($productsIndex !== false){
  $filteredParts = array_slice($pathParts, 0, $productsIndex + 1);
  $newPath = implode('/', $filteredParts);
  $url = '/'. $pathParts[1];

  /* Verify ID */
  if(isset($pathParts[2])){
    $Id = $pathParts[2];
  }
}