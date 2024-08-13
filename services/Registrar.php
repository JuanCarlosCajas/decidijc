<?php

require __DIR__ ."/../connection/conect.php";

if(!empty($_POST['btnRegister'])){

  # Logica de una imagen
  $imagen = $_FILES["imagen"]["tmp_name"];
  $nombreImagen = $_FILES["imagen"]["name"];
  $tipoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
  $directorioRegistro = "img/";
  $directorioCarpeta = __DIR__."/../img/"; 
  #Logica normal
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $categoria = $_POST["categoria"];
  $precio = $_POST["precio"];

  if($tipoImagen == "jpg" or $tipoImagen == "jpeg" or $tipoImagen == "png"){
    $registro = $conn->prepare("INSERT INTO producto(name, description, url, price, categoria) VALUES(?, ?, '', ?, ?)");
    $registro->bind_param("ssis", $nombre, $descripcion, $precio, $categoria);
    $registro->execute();
    $idRegistro = $registro->insert_id;

    $ruta = $directorioRegistro . $idRegistro . "." . $tipoImagen;
    $actualizarImgen = $conn->query("update producto set url = '$ruta' where id= $idRegistro");
    $ruta = $directorioCarpeta . $idRegistro . "." . $tipoImagen;
    if (move_uploaded_file($imagen, $ruta)) {
      echo "Registro Exitoso";
    } else {
      echo "Registro cancelado";
    }
  }
}