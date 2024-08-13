<?php
class Conection extends mysqli{
  function __construct(){
    parent::__construct('localhost', 'root', '', 'api');
    $this->set_charset('utf8');
    $this->connect_error == null ? 'Conexion exitosa' : die('Error al conectar');
  }
}