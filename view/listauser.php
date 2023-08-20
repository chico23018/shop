<?php
        require_once "./php/main.php";

        # Eliminar usuario #
     /*   if(isset($_GET['user_id_del'])){
            require_once "./php/usuario_eliminar.php";
        }*/

        if(!isset($_GET['page'])){
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];
            if($pagina<=1){
                $pagina=1;
            }
        }

        $pagina=limpiar_cadena($pagina);
        $url="index.php?vista=newProduct&page=";
        $registros=5;
        $busqueda="";

        # Paginador usuario #
        require_once "./php/listaproductosuser.php";
        
    ?>