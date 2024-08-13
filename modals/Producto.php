<?php
  header('Content-type: application/json');

  class Producto {

    public static function obtenerProductos() {
      $json_file = 'productos.json';
      $json_data = file_get_contents($json_file, true);
      return json_decode($json_data, true);
    }

    public static function getAll(){
      require __DIR__ ."/../connection/conect.php";
      $datos = [];

      $query = "SELECT * FROM producto";
      $stmt = $conn->prepare($query);
      $stmt->execute();
      $resultados = $stmt->get_result();
      if($resultados->num_rows){
        while($row = $resultados->fetch_assoc()){
          $datos[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'url_thumbnail' => "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI'])."/".$row['url'],
            'category' => $row['categoria'],
            'price' => $row['price']
          ];
        }
        return $datos;
      }
      
      return $datos;
      
      
    }
  }