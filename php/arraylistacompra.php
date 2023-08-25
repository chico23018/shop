<?php
require_once "./php/Carrello.php";
require_once "main.php";
require_once "session.php";
require_once "./inc/script.php";




$id =0;
if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(isset($_GET['id'])){
        $id=  $_GET['id'];
    }


}
if (isset($_SESSION['array'])) {
    if (class_exists('Carrello')) {
        $carkkd=$_SESSION['array'];
        $arrayProducto  = unserialize($carkkd); }

}else{
    $arrayProducto =array();
}

    $check_product=conexion();
    $check_product=$check_product->query("SELECT * FROM producto  WHERE idProducto='$id'");

    if($check_product->rowCount()==1){

        $check_product=$check_product->fetch();

        $cantidad = 1;
         $pos = 0;
        $idpp = $id;
        $subtotal=0.0;
       // $car1 = new Carrello();
    
        if(count($arrayProducto)>0){
       for ($i=0; $i <count($arrayProducto) ; $i++) { 
          if ($arrayProducto[$i]->getIdproduct()==$idpp) {
           
            $pos =$i;
        }
    }
    
        if($idpp==$arrayProducto[$pos]->getIdproduct()){
       $cantidad = $arrayProducto[$pos]->getQuantita() + $cantidad;
       $subtotal =$arrayProducto[$pos]->getSubTotal() * $cantidad;
       $arrayProducto[$pos]->setSubTotal($subtotal);
       $arrayProducto[$pos]->setQuantita($cantidad);
        }else{
           $carrel=  $check_product;
            $car = new Carrello(0,$carrel['idProducto'],$carrel['Nombres'],$carrel['Foto'],$carrel['Descripcion'],$carrel['Precio'],$cantidad,$carrel['Precio']*$cantidad);
        
            array_push($arrayProducto,$car);
        }
    
    
        }else{
            
            $carrel=  $check_product;
            $car = new Carrello(0,$carrel['idProducto'],$carrel['Nombres'],$carrel['Foto'],$carrel['Descripcion'],$carrel['Precio'],$cantidad,$carrel['Precio']*$cantidad);
            array_push($arrayProducto,$car);
        }
    
    for ($i=0; $i <count($arrayProducto); $i++) { 
        $arrayProducto[$i]->setItem($i+1);
        
    }
       $_SESSION['cont']= count($arrayProducto);
     
       $_SESSION['array']= serialize($arrayProducto);
       $carrel=null;
       $check_product=null;

       }
       else{
        exit();
       }
      
      if($_SERVER["REQUEST_METHOD"] === "GET"){
        if(isset($_GET['page'])){
            $page=  $_GET['page'];
        }
    
    
    }
       
     
       if(headers_sent()){
		echo "<script> window.location.href='./index.php?vista=lista&page=".$page."'; </script>";
	   }else{
        header("Location: ./index.php?vista=lista&page=". $page);
	  }

?>
