<div class="container mt-4">
            <div class="row">
<?php
$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
$tabla = "";

if (isset($busqueda) && $busqueda != "") {

    $consulta_datos = "SELECT * FROM usuario WHERE ((usuario_id!='" . $_SESSION['id'] . "') AND (usuario_nombre LIKE '%$busqueda%' OR usuario_apellido LIKE '%$busqueda%' OR usuario_usuario LIKE '%$busqueda%' OR usuario_email LIKE '%$busqueda%')) ORDER BY usuario_nombre ASC LIMIT $inicio,$registros";

    $consulta_total = "SELECT COUNT(usuario_id) FROM usuario WHERE ((usuario_id!='" . $_SESSION['id'] . "') AND (usuario_nombre LIKE '%$busqueda%' OR usuario_apellido LIKE '%$busqueda%' OR usuario_usuario LIKE '%$busqueda%' OR usuario_email LIKE '%$busqueda%'))";

} else {
   

    $consulta_datos = "SELECT * FROM producto ORDER BY idProducto ASC LIMIT $inicio,$registros";

    $consulta_total = "SELECT COUNT(idProducto) FROM producto";

}

$conexion = conexion();
$datos = $conexion->query($consulta_datos);

$datos = $datos->fetchAll();

$total = $conexion->query($consulta_total);
$total = (int) $total->fetchColumn();

$tabla .= '<div class="container mt-4">
            <div class="row">';
$Npaginas = ceil($total / $registros);
if ($total >= 1 && $pagina <= $Npaginas) {
    $contador = $inicio + 1;
    $pag_inicio = $inicio + 1;

    foreach ($datos as $rows) {

        $tabla .= '
   
			<div class="col-sm-4">
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <label class="col-sm-12">' . $rows['Nombres'] . '</label>                                    
                        </div>
                        <div class="card-body text-center d-flex">
                            <label><i class="fas fa-dollar-sign">' . $rows['Precio'] . '</i></label>
                            <img src="' . $rows['Foto'] . '" width="200" height="170">
                        </div>
                        <div class="card-footer">
                            <div class="col-sm-12">
                                <label>' . $rows['Descripcion'] . '</label>                                   
                            </div>
                            <div class=" col-sm-12 text-center">                                
                                <a href="Controlador?accion=AgregarCarrito&id=' . $rows['idProducto'] . '" class="btn btn2 btn-outline-primary">Agregar a Carrito<i class="fas fa-cart-plus"></i></a>
                                <a href="Controlador?accion=Comprar&id=' . $rows['idProducto'] . '" class="btn btn-danger">Comprar</a>
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
       
            ';
        $contador++;
    }
    $pag_final = $contador - 1;
} else {
    if ($total >= 1) {
        $tabla .= '
				<p class="has-text-centered" >
					<a href="' . $url . '1" class="button is-link is-rounded is-small mt-4 mb-4">
						Haga clic acá para recargar el listado
					</a>
				</p>
			';
    } else {
        $tabla .= '
				<p class="has-text-centered" >No hay registros en el sistema</p>
			';
    }
}

if ($total > 0 && $pagina <= $Npaginas) {
    $tabla .= '<p class="has-text-right">Mostrando productos <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
}

$conexion = null;

$tabla .= '  </div>
    </div>';

echo $tabla;

if ($total >= 1 && $pagina <= $Npaginas) {
    echo paginador_tablas($pagina, $Npaginas, $url, 7);
}

?>
</div>
        </div>