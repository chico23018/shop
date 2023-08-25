<?php
                        include_once "./php/session.php"; 
                       

                      
$tabla='
<form action="../php/updatequantita" method="post">               
                      
<thead class="thead-light">
<tr class="text-center">
    <th>Item</th>                               
    <th>Articulo</th>
    <th>Descripcion</th>
    <th>Precio</th>
    <th>Cantidad</th>                       
    <th>Total</th>                       
    <th>Acciones</th>  
                         
</tr>
</thead>';


                        

             if(isset($_SESSION['array'])){
                            include "./php/Carrello.php";
                            
                            if (class_exists('Carrello')) {
                                
                              
                                $arrayProducto  = unserialize($_SESSION['array']); }

                           /* foreach ( $arrayProducto as $key ) {
                                echo $key;
                            }*/
                            
                           
                          
                                for ($i=0; $i <count($arrayProducto) ; $i++) { 
                                    # code...
                                

                                $tabla .= '
                                <tbody>
                                    
                                <tr class="text-center tr">
                                    <td>' .$arrayProducto[$i]->getItem(). '</td>
                                    <td>' . $arrayProducto[$i]->getNome()  . '
                                        <img src="' . $arrayProducto[$i]->getImagine(). '" width="130" height="110">
                                    </td>
                                    <td>' . $arrayProducto[$i]->getDescrizione(). '</td> 

                                    <td>' . $arrayProducto[$i]->getPrezzocompra(). '</td>
                                    <td>        
                                    <input type="hidden" id="item1"  value="'. $arrayProducto[$i]->getIdproduct() .'">
                                    <input type="number" min="1" max="10" id="Cant" class=" form-control text-center" value="' . $arrayProducto[$i]->getQuantita(). '">
                                </td>  
                                <td><div>' . $arrayProducto[$i]->getSubTotal() . '</div></td>                           
                                        <td class="text-center">                                         
                                            <input type="hidden" id="item2" value="' . $arrayProducto[$i]->getIdproduct() . '">
                                            <a id="deleteItem" href="#" class="btn"><i class="fas fa-trash-alt"></i></a>                                            
                                        </td>                           
                                    </tr>
                                
                            </tbody>
                                                   
                        </tbody>
                    
                        </form>    
                                    ';}
                                  
                                       
                                   
                                
                          echo $tabla;

                          
                        }else{
                            exit();
                        }
                        $_SESSION['array']= serialize($arrayProducto);
                        
                        ?>