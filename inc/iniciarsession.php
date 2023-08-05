 <!-- Modal Iniciar Session o Registrarse -->

 <div class="" id="" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="container col-lg-9">                   
                    <div class="modal-content">                   
                        <div class="pr-2 pt-1">                         
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>                    
                        </div>
                        <div class="text-center">                         
                            <img src="img/user.png" width="100" height="100">                         
                        </div>
                        <div class="modal-header text-center">                      
                            <ul class="nav nav-pills">                           
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#pills-iniciar">Iniciar Sesion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#pills-registrar">Registrarse</a>
                                </li>                          
                            </ul>  
                        </div>
                        <div class="modal-body"> 
                            <div class="tab-content" id="pills-tabContent">
                                <!-- Iniciar Session -->
                                <div class="tab-pane fade show active" id="pills-iniciar" role="tabpanel">
                                    <form action="./php/login.php" method="post">
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" name="txtemail" class="form-control" placeholder="email@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="txtpass" class="form-control" placeholder="Password">
                                        </div>                                   
                                        <button type="submit" name="accion" value="Validar" class="btn btn-outline-danger btn-block">Iniciar</button>
                                    </form>
                                </div>
                                <!-- Registrarse -->
                                <div class="tab-pane fade" id="pills-registrar" role="tabpanel">
                                    
                               
                                    
                                    
                                    <form action="./php/registro_usuario.php" method="post" class="FormularioAjax">                               
                                        <div class="form-group">
                                            <label >Nome</label>
                                            <input type="text" name="txtnom" class="form-control" placeholder="Nome e Cognome">
                                        </div>
                                        <div class="form-group">
                                            <label>Codice Fiscale</label>
                                            <input type="text" maxlength="50" name="txtdni" class="form-control" placeholder="Codice Fiscale">
                                        </div>
                                        <div class="form-group">
                                            <label>Direzione</label>
                                            <input type="text" name="txtdire" class="form-control" placeholder="Direzione">
                                        </div>
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" name="txtemail" class="form-control" placeholder="email@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="txtpass" class="form-control" placeholder="Password">
                                        </div>                                  
                                        <button type="submit"   name="accion" value="Registrar" class="btn btn-outline-danger btn-block" >Crear Cuenta</button>
                                    </form>
                                                                                                                  
                                </div>                          
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
         <?php include "script.php";?>