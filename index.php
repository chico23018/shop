<?php
include "./php/session.php"; 

if (!isset($_SESSION['logou']) && !isset($_SESSION['email'])) {
  
  $_SESSION['logou'] = "Iniciar Sesion";
  $_SESSION['email'] = "Iniciar Sesion";
  $_SESSION['user'] = "";
  $_SESSION['cont'] = "0";
}?>
<!DOCTYPE html>
<html>
<?php require_once "./inc/head.php" ?>

<body>
  <?php 
   if (!isset($_GET['vista']) || $_GET['vista'] == "") {
    $_GET['vista'] = "lista";

}
if (
  is_file("./view/" . $_GET['vista'] . ".php") && $_GET['vista'] != "lista"
  && $_GET['vista'] != "404" ) {
    include "./inc/navbar.php";
    include "./view/" . $_GET['vista'] . ".php";
    include "./inc/script.php";
   
  }else if ( is_file("./php/" . $_GET['vista'] . ".php") && $_GET['vista'] != "lista"
  && $_GET['vista'] != "404"){
    include "./php/" . $_GET['vista'] . ".php";
  }else {
    if ($_GET['vista'] == "lista") {
      include "./inc/navbar.php";
      require_once "./view/lista.php";
      include "./inc/script.php";
    } else {
     //   include "./vista/404.php";
    }

}
 
  
  ?>
  <?php require_once "./inc/iniciarsession.php"; ?>
  
</body>

</html>