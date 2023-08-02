<?php
include "../php/session.php"; 
require_once "../php/main.php";
$nombre=limpiar_cadena($_POST['txtNombre']);
if(!$_SESSION['logou'] =="Iniciar Sesion"){

    echo "I'm here";
    echo '<div class="alert alert-info" role="alert" style="text-align:center">
    <strong>¡Producto Salvat!</strong><br>
        Nuevo Producto aggiunto
    </div>';
      /* Directorios de imagenes */
  $img_dir='../img/producto/';


  /*== Comprobando si se ha seleccionado una imagen ==*/
  if($_FILES['producto_foto']['name']!="" && $_FILES['producto_foto']['size']>0){

      /* Creando directorio de imagenes */
      if(!file_exists($img_dir)){
          if(!mkdir($img_dir,0777)){
              echo '
                  <div class="notification is-danger is-light">
                      <strong>¡Ocurrio un error inesperado!</strong><br>
                      Error al crear el directorio de imagenes
                  </div>
              ';
              exit();
          }
      }

      /* Comprobando formato de las imagenes */
      if(mime_content_type($_FILES['producto_foto']['tmp_name'])!="image/jpeg" && mime_content_type($_FILES['producto_foto']['tmp_name'])!="image/png"){
          echo '
              <div class="notification is-danger is-light">
                  <strong>¡Ocurrio un error inesperado!</strong><br>
                  La imagen que ha seleccionado es de un formato que no está permitido
              </div>
          ';
          exit();
      }


      /* Comprobando que la imagen no supere el peso permitido */
     /* if(($_FILES['producto_foto']['size']/1024)>3072){
          echo '
              <div class="notification is-danger is-light">
                  <strong>¡Ocurrio un error inesperado!</strong><br>
                  La imagen que ha seleccionado supera el límite de peso permitido
              </div>
          ';
          exit();
      }/*


      /* extencion de las imagenes */
      switch(mime_content_type($_FILES['producto_foto']['tmp_name'])){
          case 'image/jpeg':
            $img_ext=".jpg";
          break;
          case 'image/png':
            $img_ext=".png";
          break;
      }

      /* Cambiando permisos al directorio */
      chmod($img_dir, 0777);

      /* Nombre de la imagen */
      $img_nombre=renombrar_fotos($nombre);

      /* Nombre final de la imagen */
      $foto=$img_nombre.$img_ext;

      /* Moviendo imagen al directorio */
      if(!move_uploaded_file($_FILES['producto_foto']['tmp_name'], $img_dir.$foto)){
          echo '
              <div class="notification is-danger is-light">
                  <strong>¡Ocurrio un error inesperado!</strong><br>
                  No podemos subir la imagen al sistema en este momento, por favor intente nuevamente
              </div>
          ';
          exit();
      }

  }else{
      $foto="";
  }


}else{
    echo '<div class="alert alert-info" role="alert" style="text-align:center">
    <strong>¡Non puoi effettuare questa azione!</strong><br>
        Prima devi iniziare sessione
    </div>';
 
   
}
 
?>