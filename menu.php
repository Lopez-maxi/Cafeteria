<?php include("admin/bd.php");
      include("carrito_de_compras/carrito.php");


      //MOSTRAMOS LOS REGISTROS DE MENU 
$sentencia= $conexion->prepare("SELECT * FROM `tbl_menu`"); 
$sentencia->execute();
$lista_menu=$sentencia->fetchAll(PDO::FETCH_ASSOC);

 //MOSTRAMOS LA CONFIGURACION GENERAL
 $sentencia= $conexion->prepare("SELECT * FROM `tbl_configuraciones`"); 
 $sentencia->execute();
 $lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KOPPEE - Coffee Shop HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
      <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.php" class="navbar-brand px-lg-4 m-0">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="nosotros.php" class="nav-item nav-link">Nosotros</a>
                    <a href="servicios.php" class="nav-item nav-link">Servicios</a>
                    <a href="menu.php" class="nav-item nav-link">Menu</a>    
                    <a href="reservas.php" class="nav-item nav-link">Reservaciones</a>
                    <a href="testimonios.php" class="nav-item nav-link">Testimonios</a>
                    <a href="contactanos.php" class="nav-item nav-link">Contactanos</a>
                    <a href="login/index.php" class="nav-item nav-link"><i
                    class="fas fa-user fa-fw"></i></a>  
                    <?php if($mensaje!=""){?>
                    <a href="carrito_de_compras/index.php" class="nav-item nav-link">Carrito (<?php
                    echo(empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
                    ?>)</a><?php }?>
                </div>
            </div>  
        </nav>
        <div class="container">
            <?php $mensaje; ?>
        </div>
    </div>
    </div>

    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Menú y precios</h1>
        </div>
    </div>
    <!-- Page Header End -->


   <!-- Menu Start -->
   <div class="container-fluid pt-5">
        <div class="container">
            <div class="row">
                
            <?php foreach($lista_menu as $registros){?>    
                <div class="col-lg-4">
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/<?php echo $registros["imagen"];?>" 
                                    data-toggle="popover"
                                    data-trigger="hover"
                                    data-content="<?php echo $registros["descripcion"];?>">
                                    
                                </div>
                        <div class="col-8 col-sm-9">
                            <h4><?php echo $registros["titulo"];?></h4>
                            <h5><p class="m-0">$ <?php echo $registros["precio"];?></p></h5>
                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($registros["id"], COD, KEY);?>">
                                <input type="hidden" name="titulo" id="titulo" value="<?php echo openssl_encrypt($registros["titulo"], COD, KEY);?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($registros["precio"], COD, KEY);?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">

                            <button name="btnAccion" value="Agregar" type="submit" class="btn btn-primary">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- Menu End -->

 <!-- Footer Start -->
 <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-">
        <div class="col-lg-3 col-md-6 mb-5">
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;"><?php echo $lista_configuraciones[19]['valor'];?></h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i><?php echo $lista_configuraciones[20]['valor'];?></p>
                <p><i class="fa fa-phone-alt mr-2"></i><?php echo $lista_configuraciones[21]['valor'];?></p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i><?php echo $lista_configuraciones[22]['valor'];?></p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;"><?php echo $lista_configuraciones[23]['valor'];?></h4>
                <div>
                    <h6 class="text-white text-uppercase"><?php echo $lista_configuraciones[24]['valor'];?></h6>
                    <p><?php echo $lista_configuraciones[25]['valor'];?></p>
                    <h6 class="text-white text-uppercase"><?php echo $lista_configuraciones[26]['valor'];?></h6>
                    <p><?php echo $lista_configuraciones[27]['valor'];?></p>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white"><?php echo $lista_configuraciones[28]['valor'];?> &copy; <a class="font-weight-bold" href="#"><?php echo $lista_configuraciones[29]['valor'];?></a>. <br><?php echo $lista_configuraciones[30]['valor'];?></a></p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $(function (){
            $('[data-toggle="popover"]').popover()
        })
            </script>
</body>

</html>