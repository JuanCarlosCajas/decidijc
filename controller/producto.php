<?php

  header('Content-type: application/json');

  require_once "./modals/Producto.php";

  switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
      if(isset($Id)){
        echo json_encode(Producto::getById($Id, true));
        http_response_code(200);
      }
      else if(isset($_GET['id'])){
        echo json_encode(Producto::getById($_GET['id'], false));
        http_response_code(200);
      }
      else if(isset($_GET['category'])){
        echo json_encode(Producto::getByCategory($_GET['category']));
        http_response_code(200);
      }
      else if(empty($_SERVER['QUERY_STRING'])){
        echo json_encode(Producto::getAll());
        http_response_code(200);
      }
      else if(isset($_GET['page']) && isset($_GET['limit'])){
        echo json_encode(Producto::getByPagination((int)$_GET['page'], (int)$_GET['limit']));
        http_response_code(200);
      }
      else{
        echo json_encode(new stdClass);
        http_response_code(404);
      }
    break;
    default:
      echo "METHOD NOT ALLOWED";
    break;
  }