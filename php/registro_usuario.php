<?php
include_once "../php/session.php"; 
    include_once "./main.php";  
       
         
           
           
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["txtnom"];
        $codice_fiscale = $_POST["txtdni"];
        $direccion = $_POST["txtdire"];     
        $email = $_POST["txtemail"];
        $password = $_POST["txtpass"];
        
            /*== Verificando campos obligatorios ==*/
    if($nombre=="" || $codice_fiscale=="" || $direccion=="" || $email=="" || $password==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Sei RESTRITATO!</strong><br>
                  Sei stato restritato con successo  
            </div>
        ';
        exit();
    }
                              
      

        // Consulta SQL de inserción
        
 
        $conexion = conexion();   
        $sql = "INSERT INTO  cliente(codice_fiscale, nome, indirizzo, Email, Password) VALUES ('$codice_fiscale','$nombre','$direccion','$email','$password')";

        
        if($conexion->query($sql)==true){
            $_SESSION['logou'] = $nombre;
            $_SESSION['email'] = $email;
            $_SESSION['codice_fiscale'] = $codice_fiscale;
           
                header("Location:../index.php");
        } else {
            echo "Error al insertar el registro: " .mysqli_query($conexion);
        } 
        
     
        /*
        // Aquí puedes realizar cualquier operación con los datos recibidos
        // Por ejemplo, mostrarlos en pantalla
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Nit: $nit</p>";
        echo "<p>Direccion: $direccion</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Password: $password</p>";
        
    */
    }

?>