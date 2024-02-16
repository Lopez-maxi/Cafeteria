<?php include("../../bd.php");

if(isset($_GET['txtid'])){

    //Borrar dicho registro con el ID correspondiente
    $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";
    $sentencia= $conexion->prepare("DELETE FROM tbl_reservas WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();
   
}

    //SELECCIONAR REGISTROS
    $sentencia= $conexion->prepare("SELECT * FROM `tbl_reservas`"); 
    $sentencia->execute();
    $lista_reservas=$sentencia->fetchAll(PDO::FETCH_ASSOC);


 include("../../templates/header.php");?>


<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar reserva</a>
    </div>
    <div class="card-body">
        
         <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lista_reservas as $registros){?>
                    <tr>
                        <td><?php echo $registros["id"] ?></td>
                        <td><?php echo $registros["nombre"] ?></td>
                        <td><?php echo $registros["correo"] ?></td>
                        <td><?php echo $registros["fecha"] ?></td>
                        <td><?php echo $registros["hora"] ?></td>
                        <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $registros['id']; ?> " role="button" role="button">Editar</a>
                        <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $registros['id']; ?>" role="button">Eliminar</a>

                        </td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
        </div>
        

    </div>
</div>

<?php include("../../templates/footer.php"); ?>