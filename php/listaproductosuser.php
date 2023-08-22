<?php
include "./inc/script.php";
$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
$tabla = "";


if (isset($_SESSION['codice_fiscale'] )) {

    $consulta_datos = "SELECT * FROM producto  where codice_fiscale ='".$_SESSION['codice_fiscale'] ."' ORDER BY idProducto ASC LIMIT $inicio,$registros";

    $consulta_total = "SELECT COUNT(codice_fiscale) FROM producto";

}else {
    echo '
    <div class="alert alert-info" role="alert" style="text-align:center">
        <strong>¡Si è verificato un errore!</strong><br>
       Devi prima iniziare sessione
    </div>
';
    exit();
}

$conexion = conexion();
$datos = $conexion->query($consulta_datos);

$datos = $datos->fetchAll();

$total = $conexion->query($consulta_total);
$total = (int) $total->fetchColumn();

$tabla .= ' <thead class="">
<tr class="text-center">
    <th>ID</th>
    <th>Nome</th>
    <th>Descrizione</th>                               
    <th>Prezzo</th>
    <th>STOCK</th>
    <th>Azione</th>
</tr>
</thead>';
$Npaginas = ceil($total / $registros);
if ($total >= 1 && $pagina <= $Npaginas) {
    $contador = $inicio + 1;
    $pag_inicio = $inicio + 1;

    foreach ($datos as $rows) {

        $tabla .= '
        <tbody>
                            
        <tr class="text-center">
            <td>' . $rows['idProducto'] . '</td>
            <td>' . $rows['Nombres'] . '
                <img src="' . $rows['Foto'] . '" width="30" height="30">
            </td>
            <td>' . $rows['Descripcion'] . '</td>                                    
            <td>' . $rows['Precio'] . '</td>
            <td>' . $rows['Stock'] . '</td>
            <td class="d-flex">
                <a href="#" class="btn btn-warning">Editar</a>
                <a href="#" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
                           
</tbody>
       
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



echo $tabla;

if ($total >= 1 && $pagina <= $Npaginas) {
    echo paginador_tablas($pagina, $Npaginas, $url, 7);
}

?>