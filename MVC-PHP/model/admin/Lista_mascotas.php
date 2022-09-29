
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql="SELECT * FROM persona, tipousuario WHERE persona.idpersona = '".$_SESSION['usuario']."' AND persona.idtipousua = tipousuario.idtipousua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>


<link rel="shortcut icon" href="../../../controller/img/mascotafeliz.png" type="image/x-icon">

<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombres']?> <?php echo $usua['apellidos']?></td>
    </tr>

    <tr><br>
        <td colspan='2' align="center">
        
        
            <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
            <input type="submit" formaction="../admin/index.php" value="Regresar" />
    </tr>
    
</form>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();

   
    header('location: /netteamsgrupo78/index.html');
}
	
?>

</div>

</div>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Lista de Mascotas</title>
</head>
    <body onload="frmadd.nom.focus">
        <section class="title">
            <h1>Lista de mascotas <?php echo $usua['tipousua']?></h1>
        </section>

        <table class = "centrar" border=1>
                <form method="GET" name="frm_consulta" class = "form" autocomplete="off">
                    <tr>
                        <td>&nbsp;</td>
                        <td>IdMascota</td>
                        <td>Nombre</td>
                        <td>Color</td>
                        <td>Raza</td>
                        <td>Especie</td>
                        <td>Propietario</td>
                        <td>Accion</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                    $sql="SELECT * FROM mascota, persona, especie WHERE mascota.idpersona = persona.idpersona AND mascota.idespecie = especie.idespecie";
                    $i=0;
                    $query=mysqli_query($mysqli,$sql);
                    while($result=mysqli_fetch_assoc($query)){
                        $i++
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['idmascota'] ?></td>
                        <td><?php echo $result['nombre'] ?></td>
                        <td><?php echo $result['color'] ?></td>
                        <td><?php echo $result['raza'] ?></td>
                        <td><?php echo $result['especie'] ?></td>
                        <td><?php echo $result['nombres'] ?> <?php echo $result['apellidos'] ?></td>
                        <td><a href="?id=<?php echo $result['idmascota'] ?>" onclick="window.open('update_mascotas.php?id=<?php echo $result['idmascota'] ?>','','width= 600,height=500, toolbar=NO');void(null);">Update/Delete</a></td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php } ?>
                </form>
            </table>
    

    </body>
</html>