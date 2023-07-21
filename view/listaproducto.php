<div class="container mt-4">
            <div class="row">

           <?php 

           include "./php/main.php";

           $conexion = conexion();
           $datos = $conexion->query("SELECT * FROM producto");
          
           $datos = $datos->fetchAll();
           if( $datos>0){

        
           foreach($datos as $rows){
           
			$tabla='
			<div class="col-sm-4">
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <label class="col-sm-12">'.$rows['Nombres'].'</label>                                    
                        </div>
                        <div class="card-body text-center d-flex">
                            <label><i class="fas fa-dollar-sign">'.$rows['Precio'].'</i></label>
                            <img src="${p.getImagen()}" width="200" height="170">
                        </div>
                        <div class="card-footer">
                            <div class="col-sm-12">
                                <label>'.$rows['Descripcion'].'</label>                                   
                            </div>
                            <div class=" col-sm-12 text-center">                                
                                <a href="Controlador?accion=AgregarCarrito&id='.$rows['idProducto'].'" class="btn btn2 btn-outline-primary">Agregar a Carrito<i class="fas fa-cart-plus"></i></a>
                                <a href="Controlador?accion=Comprar&id='.$rows['idProducto'].'" class="btn btn-danger">Comprar</a>
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
            ';
            echo $tabla ;
		}
    }else{
        echo "lista vuota";
    }
           
           ?> 
               
            </div>
        </div>