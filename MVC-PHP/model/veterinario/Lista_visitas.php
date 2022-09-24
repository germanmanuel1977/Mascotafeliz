
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql="SELECT * FROM persona, tipousuario WHERE persona.idpersona = '".$_SESSION['usuario']."' AND persona.idtipousua = tipousuario.idtipousua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>




<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombres']?> <?php echo $usua['apellidos']?></td>
    </tr>

    <tr><br>
        <td colspan='2' align="center">
        
        
            <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
            <input type="submit" formaction="../veterinario/index.php" value="Regresar" />
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
    <title>taller</title>
</head>
    <body onload="frmadd.nom.focus">
        <section class="title">
            <h1>Lista de visitas <?php echo $usua['tipousua']?></h1>
        </section>

        <table class = "centrar" border=1>
                <form method="GET" name="frm_consulta" class = "form" autocomplete="off">
                    <tr>
                        <td>&nbsp;</td>
                        <td>IdVisita</td>
                        <td>IdMascota</td>
                        <td>Nombre</td>
                        <td>Veterinario</td>
                        <td>Fecha</td>
                        <td>Hora</td>
                        <td>Temperatura</td>
                        <td>Peso</td>
                        <td>Frecuencia Respiratoria</td>
                        <td>Frecuencia cardiaca</td>
                        <td>Recomendaciones</td>
                        <td>Estado</td>
                        <td>Accion</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                    $sql="SELECT * FROM visita, mascota, persona, estado WHERE visita.idmascota = mascota.idmascota AND visita.idpersona = persona.idpersona AND visita.idestado = estado.idestado";
                    $i=0;
                    $query=mysqli_query($mysqli,$sql);
                    while($result=mysqli_fetch_assoc($query)){
                        $i++
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['idvisita'] ?></td>
                        <td><?php echo $result['idmascota'] ?></td>
                        <td><?php echo $result['nombre'] ?></td>
                        <td><?php echo $result['nombres'] ?> <?php echo $result['apellidos'] ?></td>
                        <td><?php echo $result['fecha'] ?></td>
                        <td><?php echo $result['hora'] ?></td>
                        <td><?php echo $result['temperatura'] ?></td>
                        <td><?php echo $result['peso'] ?></td>
                        <td><?php echo $result['frecrespiratoria'] ?></td>
                        <td><?php echo $result['freccardiaca'] ?></td>
                        <td><?php echo $result['recomendaciones'] ?></td>
                        <td><?php echo $result['estado'] ?></td>
                        <td><a href="?id=<?php echo $result['idvisita'] ?>" onclick="window.open('update_visitas.php?id=<?php echo $result['idvisita'] ?>','','width= 600,height=500, toolbar=NO');void(null);">Update/Delete</a></td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php } ?>
                </form>
            </table>
    

    </body>
</html>