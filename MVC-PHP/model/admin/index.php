
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
        <td colspan='2' align="center"><?php echo $usua['nombres']?></td>
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
        <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
        <input type="submit" formaction="../index.php" value="Regresar" />
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
    <body>
        <section class="title">
            <h1>INTERFAZ    <?php echo $usua['tipousua']?></h1>
        </section>
    
        <nav class="navegacion">
           
            <ul class="menu wrapper" >
    
                <li class="first-item">
                    <a href="agreg_usu.php">
                        <img src="img/analisis.png" alt="" class="imagen">
                        <span class="text-item">Crear tipo de usuario</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="usuarios.php">
                        <img src="img/ejecucion.png" alt="" class="imagen">
                        <span class="text-item">Crear usuarios</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_estado.php">
                        <img src="img/implementar.jpg" alt="" class="imagen">
                        <span class="text-item">Crear Estado</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_especie.php">
                        <img src="img/planear.png" alt="" class="imagen">
                        <span class="text-item">Crear Especie</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_medicamento.php">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">Crear Medicamento</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li class="crear_afiliacion.php">
                    <a href="#">
                        <img src="img/analisis.png" alt="" class="imagen">
                        <span class="text-item">Crear Afiliación</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_mascota.php">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">Crear Mascota</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_visita.php">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">Crear Visita</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="crear_historia.php">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">Crear Historia Clinica</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 10</span>
                        <span class="down-item"></span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 11</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                
            </ul>
            
        </nav>
    </body>
</html>