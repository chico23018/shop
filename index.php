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
  require_once "./inc/navbar.php";
  require_once "./view/lista.php";
  ?>
  <?php require_once "./inc/iniciarsession.php"; ?>
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="./js/index.js" type="text/javascript"></script>
</body>

</html>