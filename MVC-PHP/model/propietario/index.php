
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM persona, tipousuario WHERE idpersona = '".$_SESSION['usuario']."' AND persona.idtipousua = tipousuario.idtipousua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>
<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombres']?> </td>
        <td colspan='2' align="center"><?php echo $usua['apellidos']?></td>
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
        <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
        <input type="submit" formaction="../../../index.html" value="Regresar" />
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
    <title>Formularios Mascota Feliz</title>
</head>
    <body>
        <section class="title">
            <h1>INTERFAZ -->   <?php echo $usua['tipousua']?></h1>
        </section>
    
        <nav class="navegacion">
           
            <ul class="menu wrapper" >
    
                <li>
                <a href="consulta.php">
                        <img src="img/consultarmascota.svg" alt="" class="imagen">
                        <span class="text-item">Consulta Mascotas</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                <li>
                    <a href="visitas.php">
                        <img src="img/consultarvisitas.svg" alt="" class="imagen">
                        <span class="text-item">Consulta Visitas</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                <li>
                    <a href="historiac.php">
                        <img src="img/consultarhistoria.svg" alt="" class="imagen">
                        <span class="text-item">Consulta Historia Clinica</span>
                        <span class="down-item"></span>
                    </a>
                </li>
            </ul>
            
        </nav>
    </body>
</html>