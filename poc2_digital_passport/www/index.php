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
    <link rel="stylesheet" href="./stylesheet.css" type="text/css" />
    <style type="text/css">.body { width: auto; }</style>
  </head>
  <body>
    <h1>¡Bienvenido al portal del Pasaporte Dígital del Papalote!</h1>
    <h2>Ingresa tus Datos:</h2>
    <form method = "post">
            <label>Número de pasaporte:</label> <input type="text" name="username" size="60"/></p>
            <label>Contraseña:</label> <input type="password" name="password" size="60"/></p>
            <input type="submit" value="Iniciar Sessión">
    </form>
    <?php
    if(isset($_SESSION["success"]) && $_SESSION["success"] != "El usuario fue validado"){
      echo '<h4 style="color: red;">' .htmlentities($_SESSION["success"]). '</h4>';
      unset($_SESSION["success"]);
      
    }else{
      echo "<h4>Aun no te has identificado.</h4>";
    }
    ?>
    <a href='register.php'>Registro de Usuarios</a>

  </body>
</html>