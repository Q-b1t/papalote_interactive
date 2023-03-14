<?php
include_once("pdo.php");
session_start();




if(isset($_POST["username"]) && isset($_POST["password"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $hash = password_hash($password,PASSWORD_DEFAULT);
  $stmt = $pdo->prepare("SELECT nombre,contra,pasaporte,creditos,usuario_id,correo FROM usuarios WHERE pasaporte = :user_name");
  $stmt->execute(array(
            ':user_name' => $username
          ));  
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if($row !== false ){
    if(password_verify($password,$row["contra"])){
      $_SESSION["success"] = "El usuario fue validado";
      $_SESSION["name"] = $row["nombre"];
      $_SESSION["user_id"] = $row["usuario_id"];
      $_SESSION["credits"] = $row["creditos"];
      $_SESSION["passport_no"] = $row["pasaporte"];
      $_SESSION["mail"] = $row["correo"];
      header("Location: profile.php");
      return;
    }

  }else{
    $_SESSION["success"] = "Revisa tus datos. Uno o más son incorrectos.";
    header("Location: index.php");
    return;
  }


}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pasaporte Digital Papalote</title>
    <meta name="description" content="description"/>
    <meta name="author" content="author" />
    <meta name="keywords" content="keywords" />
    <link rel="stylesheet" href="styles.css" type="text/css" />
    <style type="text/css">.body { width: auto; }</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class="background">
    <div class="row header">
    <h1>¡Bienvenido al portal del Pasaporte Dígital del Papalote!</h1>
    <h2>Ingresa tus Datos:</h2>
    </div>
    <br/>
    <div>
    <form method = "post">

            <div class="row">
              <div class="col-sm-3 offset-sm-2">
              <label class="form-label">Número de pasaporte:</label> 
              </div>
              <div class="col-sm-6">
              <input class="form-control form-control-sm" type="text" name="username" size="60"/>
              </div>
            </div>

            <br/>
            <div class="row">
              <div class="col-sm-3 offset-sm-2">
              <label class="form-label">Contraseña:</label> 
              </div>
              <div class="col-sm-6">
              <input class="form-control form-control-sm" type="password" name="password" size="60"/>
              </div>
            </div>

            <br/>
            <div class="row">
              <div class="col-sm-3 offset-sm-2">
                <input class = "btn btn-primary btn-sm"type="submit" value="Iniciar Sessión">
              </div>
            </div>
    </form>
    </div>
    <div class = "footer">
    <?php
    if(isset($_SESSION["success"]) && $_SESSION["success"] != "El usuario fue validado"){
      echo '<h4 style="color: red;">' .htmlentities($_SESSION["success"]). '</h4>';
      unset($_SESSION["success"]);
      
    }else{
      echo "<h4>Aun no te has identificado.</h4>";
    }
    ?>
    <a href='register.php'>Registro de Usuarios</a>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>
</html>