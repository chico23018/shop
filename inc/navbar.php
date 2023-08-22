<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><i>T-MARKET BEST SHOES IN TOWN</i></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home<span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?vista=newProduct"><i class="fas fa-plus-circle"></i>
                    Produtti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?vista=carrello1"><i class="fas fa-cart-plus">(<label
                            style="color: darkorange">
                            <?php echo $_SESSION['cont']; ?>
                        </label>)</i> Carrello</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="Controlador?accion=Acerca_de">About</a>
            </li>
        </ul>

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <!--<form class="form-inline my-2 my-lg-0">-->
            <input style="width:400px" class="form-control mr-sm-2" id="txtBuscar">
            <button class="btn btn-outline-info my-2 my-sm-0" id="btnBuscar"><i class="fas fa-search"></i>
                Cerca</button>
            </form>
        </ul>



        <ul class="navbar-nav btn-group my-2 my-lg-0" role="group">
            <a style="color: white; cursor: pointer" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-user-tie"></i>
                <?php echo $_SESSION['logou']; ?>
            </a>
            <div class="dropdown-menu text-center dropdown-menu-right">
                <a class="dropdown-item" href="#"><img src="" alt="60" height="60" /></a>
                <a class="dropdown-item" href="#">
                    <?php echo $_SESSION['user']; ?>
                </a>
                <a class="dropdown-item" href="index.php?vista=iniciarsession">
                    <?php echo $_SESSION['email']; ?>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Controlador?accion=MisCompras">mi acquisti</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?vista=logout"> <i class="fas fa-arrow-right"> Esci</i></a>
            </div>
        </ul>


    </div>
</nav>