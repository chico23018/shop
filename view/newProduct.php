<div class="form-rest" id="liveAlertPlaceholder" ></div>
<div class="container mt-4">            
            <div class="row">
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Aggiungi Produtto</h3>
                        </div>                
                        <div class="card-body">
                            <form action="./php/new_product.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nome:*</label>
                                    <input type="text" name="txtNombre" class="form-control" required>
                                </div>                     
                                <div class="form-group">
                                    <label>Descrizione:*</label>
                                    <textarea name="txtDescripcion" class="form-control"></textarea required>
                                </div>
                                <div class="form-group">
                                    <label>Prezzo*</label>
                                    <input type="text" name="txtPrecio" class="form-control" pattern="[0-9.,]{1,70}" placeholder="0123456" required>
                                </div>
                                <div class="form-group">
                                    <label>Stock*</label>
                                    <input type="text" name="txtStock" class="form-control" pattern="[0-9]{1,70}" placeholder="0123456" required>
                                </div>
                                <div class="form-group">                            
                                    <input type="file" name="producto_foto" placeholder="sad">
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-danger" name="accion" value="GuardarProducto">Guardar</button>
                                </div>
                            </form>
                        </div>               
                    </div>
                </div> 
                
                <div class="col-sm-7">
                <table class="table table-responsive">

                  <?php  require_once "listauser.php"?>

                    
                    </table>

                </div>
            </div>
        </div>
    