<?php 
include('../admin/bd.php');
include('carrito.php');


//MOSTRAMOS LOS DETALLES DE FACTURACION

$sentencia= $conexion->prepare("SELECT * FROM `tbl_configuraciones`"); 
$sentencia->execute();
$configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);


   $sentencia= $conexion->prepare("SELECT * FROM `tbl_ventas`"); 
   $sentencia->execute();
   $ventas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

   $total='100';
 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Malusa Coffee</title>
    <style>
       
    </style>
</head>
<body>
    <main>
        <div class="container">
            <h1>Factura de la venta:</h1>
        </div><br><br><br><br>
        <section class="buyer-info">
            <p><?php echo $configuraciones[0]['valor'];?></p>
            <p><?php echo $configuraciones[20]['valor'];?></p>
            <p><?php echo $configuraciones[21]['valor'];?></p>
            <p><?php echo $configuraciones[22]['valor'];?></p>
        </section>
        <section>
            <h2>Detalle de la venta:</h2>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($_SESSION['carrito'] as $indice=>$registros){?>
                    <tr>
                        <td><?php echo $registros['titulo'];?></td>
                        <td><?php echo $registros['cantidad'];?></td>
                        <td>$ <?php echo $registros['precio'];?></td>
                        <?php }?>
                    </tr>
                    <tr>
                    
                        <td colspan="2" align="right"><h3>TOTAL A PAGAR:</h3></td>
                        <td align="right"><h4>$ <?php echo ($total);?></h4></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>