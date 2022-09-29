
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
            <input type="submit" formaction="../propietario/index.php" value="Regresar" />
    </tr>
    
</form>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();

   
    header('location: ../../index.html');
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
    <title>Consulta Mascota</title>
</head>
    <body onload="frmadd.nom.focus">
        <section class="title">
            <h1>Lista de Mascotas por  <?php echo $usua['tipousua']?></h1>
        </section>

        <table class = "centrar" border=1>
                <form method="GET" name="frm_consulta" class = "form" autocomplete="off">
                    <tr>
                        <td>&nbsp;</td>
                        <td>Documento</td>
                        <td>Nombre</td>
                        <td>Apellidos</td>
                        <td>Direccion</td>
                        <td>Nombre Mascota</td>
                        <td>Color </td>
                        <td>Raza</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                    $sql="SELECT * FROM persona, mascota WHERE persona.idpersona = mascota.idpersona AND persona.idpersona ='".$_SESSION['usuario']."' ";
                    $i=0;
                    $query=mysqli_query($mysqli,$sql);
                    while($result=mysqli_fetch_assoc($query)){
                        $i++
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['idpersona'] ?></td>
                        <td><?php echo $result['nombres'] ?></td>
                        <td><?php echo $result['apellidos'] ?></td>
                        <td><?php echo $result['direccion'] ?></td>
                        <td><?php echo $result['nombre'] ?></td>
                        <td><?php echo $result['color'] ?></td>
                        <td><?php echo $result['raza'] ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php } ?>
                </form>
            </table>
    

    </body>
</html>