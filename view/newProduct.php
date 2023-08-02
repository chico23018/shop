<div class="form-rest" id="liveAlertPlaceholder" ></div>

<div class="container mt-4">            
            <div class="row">
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Aggiungi Produtto</h3>
                        </div>                
                        <div class="card-body">
                            <form action="./php/new_product.php" method="POST" class="FormularioAjax" autocomplete="off"enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input type="text" name="txtNombre" class="form-control">
                                </div>                     
                                <div class="form-group">
                                    <label>Descrizione</label>
                                    <textarea name="txtDescripcion" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Prezzo</label>
                                    <input type="text" name="txtPrecio" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="text" name="txtStock" class="form-control">
                                </div>
                                <div class="form-group">                            
                                    <input type="file" name="producto_foto" placeholder="sad">
                                </div>
                                <div class="form-group">
                                <input type="submit" class="btn btn-danger" name="accion" value="Guardar">
                                </div>
                            </form>
                        </div>               
                    </div>
                </div> 
                <div class="col-sm-7">
                    <table class="table table-responsive">
                        <thead class="">
                            <tr class="text-center">
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>DESCRIPCION</th>                               
                                <th>PRECIO</th>
                                <th>STOCK</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <c:forEach var="p" items="${productos}">
                                <tr class="text-center">
                                    <td>${p.getId()}</td>
                                    <td>${p.getNombres()}
                                        <img src="${p.getImagen()}" width="30" height="30">
                                    </td>
                                    <td>${p.getDescripcion()}</td>                                    
                                    <td>${p.getPrecio()}</td>
                                    <td>${p.getStock()}</td>
                                    <td class="d-flex">
                                        <a href="#" class="btn btn-warning">Editar</a>
                                        <a href="#" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            </c:forEach>                           
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
     <?php   echo "
 <script>
 function enviarFormulario() {
     // Aquí puedes agregar cualquier validación que desees antes de enviar el formulario
 
     // Si todo está bien, se envía el formulario y después se recarga la página
     return true;
 }
 
 function recargarPagina() {
     location.reload();
 }
 </script>";?>