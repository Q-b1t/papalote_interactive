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
  else{ // all validations passed
    // store the salted hash 
    $hash = password_hash($password,PASSWORD_DEFAULT);

    // sql request
    $stmt = $pdo->prepare('INSERT INTO usuarios (nombre,contra,pasaporte,creditos,correo) VALUES (:user_name, :user_password, :user_passport, :user_credits, :user_mail)');
    $stmt->execute(array(
            ':user_name' => $name,
            ':user_password' => $hash,
            ':user_passport' => $passport_no,
            ':user_credits' => $credits,
            ':user_mail' => $mail
    ));
    $_SESSION["register_success"] = "El nuevo ususario se dio de alta en el sistema";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h1>Registro de Usuarios</h1>
    <h2>Solo para personal administrativo</h2>

    <p>Ingrese los datos requeridos, asi como el número de identificación impreso en el pasaporte físico.</p>
    <form method = "post">
            <label class="form-label">Nombre:</label> <input class="form-control form-control-sm" type="text" name="name" size="10"/></p>
            <label class="form-label">Contraseña:</label> <input class="form-control form-control-sm" type="password" name="password" size="60"/></p>
            <label class="form-label">Número de Pasaporte:</label> <input class="form-control form-control-sm" type="text" name="passport_no" size="60"/></p>
            <label class="form-label">Correo de Contacto:</label> <input class="form-control form-control-sm" type="text" name="contact_mail" size="60"/></p>
            <label class="form-label">Creditos:</label> <input class="form-control form-control-sm" type="text" name="credits_no" size="60"/></p>
            <input type="submit" value="Registrar Usuario">
            <input type="submit" name="cancel" value="Cancelar">

    </form>

    <?php
        if(isset($_SESSION["error_internal"])){
            echo('<h4 style="color: red;">' . htmlentities($_SESSION['error_internal']) . "</h4>\n");
            unset($_SESSION['error_internal']);
        }
        if(isset($_SESSION["register_success"])){
          echo('<h4 style="color: greeb;">' . htmlentities($_SESSION['register_success']) . "</h4>\n");
          unset($_SESSION['register_success']);
        }
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>