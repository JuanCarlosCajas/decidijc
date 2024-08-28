<?php
session_start();

$Accepted = false;
$Correcto = false;
if(isset($_COOKIE['usuario'])){
  $Accepted = true;
}
else if (isset($_POST['user']) && isset($_POST['password'])) {
  $user = $_POST['user'];
  $password = hash("sha256", $_POST['password']);
  $password = substr($password, 0, 20);

  require("connection/conect.php");
  $stmt = $conn->prepare("SELECT password FROM admin WHERE user = ?");
  $stmt->bind_param("s", $user);
  $stmt->execute();
  $resultado = $stmt->get_result();
  while ($fila = $resultado->fetch_assoc()){
    if($fila["password"] == $password){
      $Accepted = true;
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $user;

      setcookie('usuario',$user, time() + 64800, "/");
    }
    else{
      $Correcto = false;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin DashBoard</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  if ($Accepted) {
  ?>
    <main class="w-100 p-4 text-bg-dark" style="height: 100dvh">
      <h1 class="text-center mt-2">Admin Dashboard</h1>
      <div class="modal-container mt-4">
        <button type="button" class="btn btn-light fw-medium" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Registrar Producto
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content text-bg-light">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="http://localhost/JsonDecidijc/services/Registrar.php" method="post" enctype="multipart/form-data" id="formRegister">
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Archivo imagen:</label>
                    <input class="form-control" type="file" id="formFile" name="imagen" accept="image/*" required>
                  </div>
                  <div class="mb-3 form-floating">
                    <input type="text" name="nombre" id="formInputNombre" class="form-control" placeholder="" autocomplete="off" required>
                    <label for="formInputNombre">Nombre Producto:</label>
                  </div>
                  <div class="mb-3 form-floating">
                    <textarea rows="3" name="descripcion" id="formInputDesc" class="form-control" placeholder="" autocomplete="off" required style="max-height: 200px; resize:vertical"></textarea>
                    <label for="formInputDesc">Descripción Producto:</label>
                  </div>
                  <div class="mb-3 form-floating">
                    <input type="text" name="categoria" id="formInputCategoria" class="form-control" placeholder="" autocomplete="off" required>
                    <label for="formInputCategoria">Categoria Producto:</label>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text fs-6 fw-medium" id="basic-addon1">$</span>
                    <input type="text" class="form-control" placeholder="Precio del producto" name="precio" aria-label="Precio" aria-describedby="basic-addon1">
                  </div>
                  <input type="submit" value="Registrar" name="btnRegister" class="btn btn-success p-2">
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-4">
        <table class="table table-dark table-hover">
          <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Imagen</th>
            <th>Precio</th>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </main>
  <?php
  } else {
  ?>
    <div class="w-100 d-flex flex-column justify-content-center align-items-center text-bg-dark" style="height:100dvh; overflow-x:hidden">
      <h1>Login Admin</h1>
      <form action="" method="post" class="mt-5">
        <div class="form-floating mb-3 has-validation">
          <input type="text" class="form-control" id="floatingInput" name="user" placeholder="" required autocomplete="off">
          <label for="floatingInput" class="text-black fs-6">Usuario</label>
          <?php if ($Correcto == false) {
          ?>
          <div class="invalid-feedback">
            Oops! Usuario incorrecto
          </div>
          <?php } ?>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="" required autocomplete="off">
          <label for="floatingPassword" class="text-black fs-6">Contraseña</label>
        </div>
        <input type="submit" value="Enviar">
      </form>
    </div>
  <?php
  }
  ?>
  <script>
    history.replaceState(null, null, location.pathname);
  /*
    document.getElementById("formRegister").addEventListener("submit", (event) => {
      event.preventDefault();
    })
      */
  </script>
</body>

</html>