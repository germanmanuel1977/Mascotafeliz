
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
        <td colspan='2' align="center"><?php echo $usua['nombres']?> <?php echo $usua['apellidos']?></td>
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
        <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
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
    <title>Formularios Mascota Feliz</title>
</head>
    <body>
        <section class="title">
            <h1>INTERFAZ    <?php echo $usua['tipousua']?></h1>
        </section>
    
        <nav class="navegacion">
           
            <ul class="menu wrapper" >
    
    
                <li>
                    <a href="crear_visita.php">
                        <img src="img/visitas.jpg" alt="" class="imagen">
                        <span class="text-item">Crear Visita</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_historia.php">
                        <img src="img/hclinica.jpg" alt="" class="imagen">
                        <span class="text-item">Crear Historia Clinica</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="Lista_visitas.php">
                        <img src="img/lvisitas.jpg" alt="" class="imagen">
                        <span class="text-item">Lista de Visitas</span>
                        <span class="down-item"></span>
                    </a>
                </li>
        
               
            </ul>
            
        </nav>
    </body>
</html>