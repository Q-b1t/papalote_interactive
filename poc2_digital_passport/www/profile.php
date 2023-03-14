<?php
require_once("pdo.php");
session_start();



if(!isset($_SESSION["user_id"])){
    $_SESSION['success'] = "Missing profile_id";
    header("Location index.php");
    return;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./stylesheet.css" type="text/css" />
    <style type="text/css">.body { width: auto; }</style>
  </head>
  <body>

    <?php echo "<h2>¡Hola, " . htmlentities($_SESSION["name"]) .  "!</h2>";?>
    <h3>Es un gusto volver a verte.</h3>
    <p>A continuación puedes encontrar la información de tu perfil:</p>
    
    <ul>
    <?php
        echo "<li>Tienes " .htmlentities($_SESSION["credits"])." creditos en tu pasaporte digital.</li>";
        echo "<br/>";
        echo "<li>Tu número de pasaporte es: ". htmlentities($_SESSION["passport_no"]) . "</li>";  
        echo "<br/>";
        echo "<li>Tu correo de contacto es: ". htmlentities($_SESSION["mail"]) . "</li>";  
    
    ?>
    </ul>
    
    <br/>
    <a href='logout.php'>Cerrar Session</a>
    

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>
</html>


