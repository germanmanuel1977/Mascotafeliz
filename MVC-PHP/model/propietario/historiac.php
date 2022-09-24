
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
    <title>Consulta Historia Clinica</title>
</head>
    <body onload="frmadd.nom.focus">
        <section class="title">
            <h1>Lista Historia Clinica  <?php echo $usua['tipousua']?></h1>
        </section>

        <table class = "centrar" border=1>
                <form method="GET" name="frm_consulta" class = "form" autocomplete="off">
                    <tr>
                        <td>&nbsp;</td>
                        <td>Hist Clin</td>
                        <td>Visita</td>
                        <td>Nombre Mascota</td>
                        <td>Medicamento</td>
                        <td>Estado Mascota</td>
                        <td>Recomendaciones</td>
                        <td>Consulta</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                    //$sql="SELECT * FROM persona, mascota WHERE persona.idpersona = mascota.idpersona AND persona.idpersona ='".$_SESSION['usuario']."' ";
                    $sql="SELECT * FROM historiaclinica, visita, medicamento, mascota, persona, estado WHERE historiaclinica.idvisita = visita.idvisita AND medicamento.idmedicamento = historiaclinica.idmedicamento AND mascota.idmascota = visita.idmascota and mascota.idpersona = persona.idpersona AND visita.idestado = estado.idestado AND persona.idpersona = '".$_SESSION['usuario']."' ";
                    $i=0;
                    $query=mysqli_query($mysqli,$sql);
                    while($result=mysqli_fetch_assoc($query)){
                        $i++
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['idhistoriac'] ?></td>
                        <td><?php echo $result['idvisita'] ?></td>
                        <td><?php echo $result['nombre'] ?></td>
                        <td><?php echo $result['medicamento'] ?></td>
                        <td><?php echo $result['estado'] ?></td>
                        <td><?php echo $result['recomendaciones'] ?></td>
                         <td><a href="?id=<?php echo $result['idpersona'] ?>" onclick="window.open('update.php?id=<?php echo $result['idpersona'] ?>','','width= 600,height=500, toolbar=NO');void(null);">Consulta</a></td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php } ?>
                </form>
            </table>
    

    </body>
</html>