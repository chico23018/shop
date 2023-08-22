<?php
                        include_once "./php/session.php"; 
                         


$tabla='<thead class="thead-light">
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
                                
                                $carkkd=$_SESSION["array"];
                                $arrayProducto  = unserialize($carkkd); }

                           /* foreach ( $arrayProducto as $key ) {
                                echo $key;
                            }*/
                        }
                         foreach ($arrayProducto as $rows) {

                            $tabla .= '
                            <tbody>
                                
                            <tr class="text-center tr">
                                <td>' . $rows->getItem(). '</td>
                                <td>' . $rows->getNome()  . '
                                    <img src="' . $rows->getImagine(). '" width="130" height="110">
                                </td>
                                <td>' . $rows->getDescrizione(). '</td>                                    
                                <td>' . $rows->getPrezzocompra(). '</td>
                                <td>        
                                <input type="hidden" id="item1" value="' . $rows->getIdproduct() . '">
                                <input type="number" min="1" max="10"  id="Cant" class=" form-control text-center" value="' . $rows->getQuantita(). '">
                            </td>  
                            <td>' . $rows->getSubTotal() . '</td>                           
                                    <td class="text-center">                                         
                                        <input type="hidden" id="item2" value="' . $rows->getIdproduct() . '">
                                        <a id="deleteItem" href="#" class="btn"><i class="fas fa-trash-alt"></i></a>                                            
                                    </td>                           
                                </tr>
                            
                        </tbody>
                                               
                    </tbody>
                           
                                ';}
                              
                                   
                            
                            
                      echo $tabla;
                        ?>