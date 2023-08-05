<?php 
include_once "../php/session.php"; 
include_once "./main.php";  
/*== Almacenando datos ==*/
$email=limpiar_cadena($_POST['txtemail']);
$clave=limpiar_cadena($_POST['txtpass']);


/*== Verificando campos obligatorios ==*/
if($email=="" || $clave==""){
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
        </div>
    ';
    exit();
}


/*== Verificando integridad de los datos ==*/
/*if(verificar_datos("[a-zA-Z0-9]{4,20}",$email)){
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El USUARIO no coincide con el formato solicitado
        </div>
    ';
    exit();
}

if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$clave)){
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            Las CLAVE no coinciden con el formato solicitado
        </div>
    ';
    exit();
}*/


$check_user=conexion();
$check_user=$check_user->query("SELECT * FROM cliente WHERE Email='$email'");

if($check_user->rowCount()==1){

    $check_user=$check_user->fetch();

    
    if($check_user['Email']==$email && $clave==$check_user['Password']){

        $_SESSION['logou'] = $check_user['nome'];
        $_SESSION['email'] = $check_user['Email'];
        $_SESSION['codice_fiscale'] =$check_user['codice_fiscale'];

        echo " ./index.php";

    }else{
        echo '
        <div class="alert alert-info" role="alert" style="text-align:center">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Usuario o clave incorrectos
            </div>
        ';
    }
}else{
    echo '
    <div class="alert alert-info" role="alert" style="text-align:center">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            Usuario o clave incorrectos
        </div>
    ';
}
$check_user=null;
?>