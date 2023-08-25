<?php  
 include_once "session.php";
 //require_once "./inc/script.php";
 
$id=$_POST['id'];
$quantita=$_POST['quantita'];

$_SESSION['quantita']=$_POST['quantita'];


echo '<div id="h">'.$quantita.'</div>';



if (class_exists('Carrello')) {
    include "./php/Carrello.php";
                                
                              
    $arrayProducto  = unserialize($_SESSION['array']); }

  
     for ($i=0; $i <count($arrayProducto); $i++) { 
        if($arrayProducto[$i]->getIdproduct()==$id){
        $arrayProducto[$i]->setQuantita($quantita);
        $arrayProducto[$i]->setSubTotal($arrayProducto[$i]->getPrezzocompra()*$quantita);
    }
        
    }


 

    $_SESSION['array']= serialize($arrayProducto);         
                    
                ?>