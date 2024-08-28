<?php

use function PHPSTORM_META\type;

header('Content-type: application/json');
class Producto
{

  public static function getAll()
  {
    require __DIR__ . "/../connection/conect.php";
    global $products;

    $query = "SELECT * FROM producto";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $resultados = $stmt->get_result();
    if ($resultados->num_rows) {
      while ($row = $resultados->fetch_assoc()) {
        $products[] = [
          'id' => $row['id'],
          'name' => $row['name'],
          'description' => $row['description'],
          'url_thumbnail' => "http://" . $_SERVER['HTTP_HOST'] . "/JsonDecidijc/" . $row['url'],
          'category' => $row['categoria'],
          'price' => $row['price']
        ];
      }
      return $products;
    }

    return $products;
  }

  public static function getById($id, $url)
  {

    require __DIR__ . "/../connection/conect.php";

    if ($url) {
      $level = 2;
    } else {
      $level = 1;
    }

    $query = "SELECT * FROM producto WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultados = $stmt->get_result();
    if ($resultados->num_rows) {
      $row = $resultados->fetch_assoc();
      $products = [
        'id' => $row['id'],
        'name' => $row['name'],
        'description' => $row['description'],
        'url_thumbnail' => "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI'], $level) . "/" . $row['url'],
        'category' => $row['categoria'],
        'price' => $row['price']
      ];
      return $products;
    }
    return new stdClass;
  }

  public static function getByCategory($category)
  {
    require __DIR__ . "/../connection/conect.php";

    $category = ucfirst(strtolower($category));

    $query = "SELECT * FROM producto WHERE categoria = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category);
    $stmt->execute();

    $resultados = $stmt->get_result();

    if ($resultados->num_rows) {
      while ($row = $resultados->fetch_assoc()) {
        $products = [
          'id_product' => $row['id'],
          'name' => $row['name'],
          'description' => $row['description'],
          'url_thumbnail' => "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . "/" . $row['url'],
          'category' => $row['categoria'],
          'price' => $row['price']
        ];
      }
      return $products;
    }
    return new stdClass;
  }

  public static function getByPagination($page, $limit)
  {
    if (gettype($page) == 'integer' && gettype($limit) == 'integer') {
      require __DIR__ . "/../connection/conect.php";
      $products = [];
      $initial = ($page - 1) * $limit;

      $query = "SELECT * FROM producto LIMIT ?, ?";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ii", $initial, $limit);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows) {
        while ($row = $result->fetch_assoc()) {
          $products[] = [
            'id_product' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'url_thumbnail' => "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . "/" . $row['url'],
            'category' => $row['categoria'],
            'price' => $row['price']
          ];
        }
        return $products;
      }
      return $products;
    }
    return new stdClass;
  }
}
