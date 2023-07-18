<div class="container mt-4">
            <div class="row">
                <c:forEach var="p" items="${productos}">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="card">
                                <div class="card-header">
                                    <label class="col-sm-12">${p.getNombres()}</label>                                    
                                </div>
                                <div class="card-body text-center d-flex">
                                    <label><i class="fas fa-dollar-sign">${p.getPrecio()}</i></label>
                                    <img src="${p.getImagen()}" width="200" height="170">
                                </div>
                                <div class="card-footer">
                                    <div class="col-sm-12">
                                        <label>${p.getDescripcion()}</label>                                   
                                    </div>
                                    <div class=" col-sm-12 text-center">                                
                                        <a href="Controlador?accion=AgregarCarrito&id=${p.getId()}" class="btn btn2 btn-outline-primary">Agregar a Carrito<i class="fas fa-cart-plus"></i></a>
                                        <a href="Controlador?accion=Comprar&id=${p.getId()}" class="btn btn-danger">Comprar</a>
                                    </div>                         
                                </div>
                            </div>
                        </div>
                    </div>
                </c:forEach>
            </div>
        </div>