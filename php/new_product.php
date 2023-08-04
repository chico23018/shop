<?php
require_once  "./php/session.php"; 
require_once "./php/main.php";
$nombre=limpiar_cadena($_POST['txtNombre']);
$stock=limpiar_cadena($_POST['txtStock']);
$descrizione=limpiar_cadena($_POST['txtDescripcion']);
$precio=limpiar_cadena($_POST['txtPrecio']);

 if(verificar_datos("[0-9- ]{1,70}",$stock)){
    echo '
    <div class="alert alert-info" role="alert" style="text-align:center">
            <strong>¡Si è verificato un errore imprevisto!</strong><br>
            Il Stock non corrisponde con il formato richiesto
        </div>
    ';
   
    exit();
}
if(verificar_datos("[0-9.,]{1,70}",$precio)){
    echo '
    <div class="alert alert-info" role="alert" style="text-align:center">
            <strong>¡Si è verificato un errore imprevisto!</strong><br>
            Il Prezzo non corrisponde con il formato richiesto
        </div>
    ';
    exit();
}

if($nombre==""||$stock==""||$precio==""||$descrizione==""){
    echo '
    <div class="alert alert-info" role="alert" style="text-align:center">
            <strong>¡Si è verificato un errore imprevisto!</strong><br>
                    Devi compilare tutti i campi
        </div>
    ';
    exit();
}


if($_SESSION['logou'] !="Iniciar Sesion"){

   
    echo '<div class="alert alert-info" role="alert" style="text-align:center">
    <strong>¡Produtto!</strong><br>
        Nuevo Produtto aggiunto
    </div>';
      /* Directorios de imagenes */
  $img_dir='../img/producto/';


  /*== Comprobando si se ha seleccionado una imagen ==*/
  if($_FILES['producto_foto']['name']!="" && $_FILES['producto_foto']['size']>0){

      /* Creando directorio de imagenes */
      if(!file_exists($img_dir)){
          if(!mkdir($img_dir,0777)){
              echo '
              <div class="alert alert-info" role="alert" style="text-align:center">
                      <strong>¡Si è verificato un errore imprevisto!</strong><br>
                      Error al creare dir
                  </div>
              ';
              exit();
          }
      }

      /* Comprobando formato de las imagenes */
      if(mime_content_type($_FILES['producto_foto']['tmp_name'])!="image/jpeg" && mime_content_type($_FILES['producto_foto']['tmp_name'])!="image/png"){
          echo '
          <div class="alert alert-info" role="alert" style="text-align:center">
                  <strong>¡Si è verificato un errore imprevisto!</strong><br>
                  L imagen che hai selezionato ha un formato non autorizato
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
          <div class="alert alert-info" role="alert" style="text-align:center">
                  <strong>¡Ocurrio un error inesperado!</strong><br>
                  No podemos subir la imagen al sistema en este momento, por favor intente nuevamente
              </div>
          ';
          exit();
      }

  }else{
      $foto="";
  }

/*== Guardando datos ==*/
    $guardar_producto=conexion();
    $guardar_producto=$guardar_producto->prepare("INSERT INTO producto(Nombres,Foto,Descripcion,Precio,Stock,codice_fiscale) VALUES(:nombre,:foto,:descripcion,:precio,:stock,:codice_fiscale)");

    $marcadores=[
        ":nombre"=>$nombre,
        ":foto"=>"./img/producto/".$foto,
        ":descripcion"=>$descrizione,
        ":precio"=>$precio,
        ":stock"=>$stock,
        ":codice_fiscale"=>$_SESSION['codice_fiscale']
    ];

    $guardar_producto->execute($marcadores);

    if($guardar_producto->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>¡PRODUCTO REGISTRADO!</strong><br>
                El producto se registro con exito
            </div>
        ';
    }else{

    	if(is_file($img_dir.$foto)){
			chmod($img_dir.$foto, 0777);
			unlink($img_dir.$foto);
        }

        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el producto, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_producto=null;

}else{
    echo '
    <div class="alert alert-info" role="alert" style="text-align:center">
    <strong>¡Non puoi effettuare questa azione!</strong><br>
        Prima devi iniziare sessione
    </div>';
 
   
}
 
?>