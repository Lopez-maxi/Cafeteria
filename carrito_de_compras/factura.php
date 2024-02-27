<?php 
include('../admin/bd.php');



//MOSTRAMOS LOS DETALLES DE FACTURACION

$sentencia= $conexion->prepare("SELECT * FROM `tbl_configuraciones`"); 
$sentencia->execute();
$configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);


   $sentencia= $conexion->prepare("SELECT * FROM `tbl_facturas`"); 
   $sentencia->execute();
   $ventas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Factura de venta</title>
</head>
<body>
    <main>
        <div class="container">
            <h1>Factura de la venta:</h1>
        </div><br><br><br><br>
        <section>
            <section>
                <p><?php echo $configuraciones[0]['valor'];?></p>
                <p><?php echo $configuraciones[20]['valor'];?></p>
                <p><?php echo $configuraciones[21]['valor'];?></p>
                <p><?php echo $configuraciones[22]['valor'];?></p>
            </section>
        </section>
        <section><br><br><br><br>
            <h1>Detalle de la venta:</h1>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($ventas as $indice=>$registros){?>
                    <tr>
                        <td><?php echo $registros['nombre_producto'];?></td>
                        <td><?php echo $registros['cantidad'];?></td>
                        <td>$ <?php echo $registros['precio_unitario'];?></td>
                        <?php }?>
                    </tr>
                    
                        <td colspan="2" align="right"><h3>TOTAL A PAGAR:</h3></td>
                        <td align="right"><h4>$ <?php echo $registros['total'];?></h4></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>