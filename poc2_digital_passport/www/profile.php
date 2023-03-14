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
    <link rel="stylesheet" href="./stylesheet.css" type="text/css" />
    <style type="text/css">.body { width: auto; }</style>
  </head>
  <body>

    <?php echo "<h2>¡Hola, " . $_SESSION["name"] .  "!</h2>";?>
    <h3>Es un gusto volver a verte.</h3>
    <p>A continuación puedes encontrar la información de tu perfil:</p>
      
    <?php
        echo "Tienes " . $_SESSION["credits"]." creditos en tu pasaporte digital.";
        echo "<br/>";
        echo "Tu número de pasaporte es: ". $_SESSION["passport_no"];  
        echo "<br/>";
        echo "Tu correo de contacto es: ". $_SESSION["mail"];  
    
    ?>
  
    
    <br/>
    <a href='logout.php'>Cerrar Session</a>
    

  

  </body>
</html>


