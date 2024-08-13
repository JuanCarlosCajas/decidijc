<?php

  header('Content-type: application/json');

  require_once "./modals/Producto.php";

  switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
      if(isset($_POST['id'])){

      }
      else{
        
        echo json_encode(Producto::getAll());
        http_response_code(200);
        
      }
      break;
  }