
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
                    <a href="crear_tipousuario.php">
                        <img src="img/analisis.png" alt="" class="imagen">
                        <span class="text-item">Crear tipo de usuario</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_usuarios.php">
                    <img src="img/planear.png" alt="" class="imagen">
                        <span class="text-item">Crear usuarios</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_estado.php">
                    <img src="img/portada.png" alt="" class="imagen">
                    <span class="text-item">Crear Estado</span>
                    <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_especie.php">
                        <img src="img/images1.png" alt="" class="imagen">
                        <span class="text-item">Crear Especie</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_medicamento.php">
                    <img src="img/medicamento.png" alt="" class="imagen">
                    <span class="text-item">Crear Medicamento</span>
                    <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_afiliacion.php">
                    <img src="img/images3.png" alt="" class="imagen">
                    <span class="text-item">Crear Afiliacion</span>
                    <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_mascota.php">
                        <img src="img/mascota.png" alt="" class="imagen">
                        <span class="text-item">Crear Mascota</span>
                        <span class="down-item"></span>
                    </a>
                </li>
               
                <li>
                    <a href="Lista_usuarios.php">
                    <img src="img/usuarios.jpg" alt="" class="imagen">
                    <span class="text-item">Lista usuarios</span>
                    <span class="down-item"></span>
                    </a>
                </li>    
                
                <li>
                    <a href="Lista_mascotas.php">
                    <img src="img/lmascotas.jpg" alt="" class="imagen">
                    <span class="text-item">Lista mascotas</span>
                    <span class="down-item"></span>
                    </a>
                </li>    
                               

            </ul>
            
        </nav>
    </body>
</html>