<?php
require_once("pdo.php");
session_start();


// mail regular expression
$regex_pattern = "/^[a-zA-Z0-9.]+\@[a-zA-Z0-9.]+$/";

// return to index if cancelled is receibed
if(isset($_POST["cancel"])){
  header("Location: index.php");
  return;
}

// data validation initiated if all the inputs are full
if(isset($_POST["name"]) && isset($_POST["password"]) && isset($_POST["passport_no"]) && isset($_POST["credits_no"]) && isset($_POST["contact_mail"])){
  $name = $_POST["name"];
  $password = $_POST["password"];
  $passport_no = $_POST["passport_no"];
  $credits = $_POST["credits_no"];
  $mail = $_POST["contact_mail"];

  // validation -> all the inputs where submitted
  if(strlen($name) < 1 || strlen($password) < 1 || strlen($passport_no) < 1 || strlen($credits) < 1 || strlen($mail) < 1){
      $_SESSION["error_internal"] = "Todos los campos son requeridos";
      header("Location: register.php");
      return;
  }
  // validation -> valid email address
  elseif(!preg_match($regex_pattern,$mail)){
      $_SESSION["error_internal"] = "Se debe ingresar un correo electronico valido.";
      header("Location: register.php");
      return;
  }
  // validation -> credits is a númeric value
  elseif(!is_numeric($credits)){
      $_SESSION["error_internal"] = "Los creditos deben de ser un valor númerico.";
      header("Location: register.php");
      return;
  }

  // store the salted hash 
  $hash = password_hash($password);

  // sql request


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
    <h1>Registro de Usuarios</h1>
    <h2>Solo para personal administrativo</h2>

    <p>Ingrese los datos requeridos, asi como el número de identificación impreso en el pasaporte físico.</p>
    <form method = "post">
            <label>Nombre:</label> <input type="text" name="name" size="60"/></p>
            <label>Contraseña:</label> <input type="password" name="password" size="60"/></p>
            <label>Número de Pasaporte:</label> <input type="text" name="passport_no" size="60"/></p>
            <label>Correo de Contacto:</label> <input type="text" name="contact_mail" size="60"/></p>
            <label>Creditos:</label> <input type="text" name="credits_no" size="60"/></p>
            <input type="submit" value="Registrar Usuario">
            <input type="submit" name="cancel" value="Cancel">

    </form>

    <?php
        if(isset($_SESSION["error_internal"])){
            echo('<h4 style="color: red;">' . htmlentities($_SESSION['error_internal']) . "</h4>\n");
            unset($_SESSION['error_internal']);
        }
    ?>


  </body>
</html>