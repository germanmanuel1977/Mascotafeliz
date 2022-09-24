<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php"); 
$sql="SELECT * FROM visita, mascota, persona, estado WHERE visita.idmascota = mascota.idmascota AND visita.idpersona = persona.idpersona AND visita.idestado = estado.idestado AND visita.idvisita = '".$_GET['id']."'";
$query=mysqli_query($mysqli,$sql);
$result=mysqli_fetch_assoc($query)
?>

<?php 
if(isset($_POST["update"]))
{
    $fecha=$_POST['fecha'];
    $hora=$_POST['hora'];
    $temperatura=$_POST['temperatura'];
    $peso=$_POST['peso'];
    $frecrespiratoria=$_POST['frecrespiratoria'];
    $freccardiaca=$_POST['freccardiaca'];
    $recomendaciones=$_POST['recomendaciones'];
    $idestado=$_POST['idestado'];
    $sql_update="UPDATE visita SET fecha = '$fecha', hora = '$hora', temperatura = '$temperatura', peso = '$peso', frecrespiratoria = '$frecrespiratoria', freccardiaca = '$freccardiaca', recomendaciones = '$recomendaciones', idestado = '$idestado' WHERE idvisita = '".$_GET['id']."'";
    $cs=mysqli_query($mysqli, $sql_update);  
   echo '<script>alert (" Actualización Exitosa ");</script>';
}
elseif(isset($_POST["delete"]))
{
    $sqldelete="DELETE FROM visita WHERE idvisita ='".$_GET['id']."'";
    $cs=mysqli_query($mysqli, $sqldelete);  
   echo '<script>alert ("Registro eliminado Exitosamente ");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<script> 
function centrar() { 
    iz=(screen.width-document.body.clientWidth) / 2; 
    de=(screen.height-document.body.clientHeight) / 2; 
    moveTo(iz,de); 
}     
</script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../controller/image/icon_proyect_final.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos_roles.css">
    <script src="https://kit.fontawesome.com/339217bc67.js" crossorigin="anonymous"></script>
    <title>Actualización registro de visita</title>
</head>
    <body onload="centrar();">
    <table>
        <form name = "consult" method="POST" autocomplete="off">
            <tr>
                <td>IdVisita</td>
                <td><input name="idvisita" value="<?php echo $result['idvisita']?>" readonly ></td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td><input type="date" name="fecha" value="<?php echo $result['fecha']?>"  ></td>
            </tr>
            <tr>
                <td>Hora</td>
                <td><input type="time" name="hora" value="<?php echo $result['hora']?>"  ></td>
            </tr>                        
            <tr>
                <td>IdMascota</td>
                <td><input name="idmascota" value="<?php echo $result['idmascota']?>" readonly ></td>
            </tr>
            <tr>
                <td>Mascota</td>
                <td><input name="nombre" value="<?php echo $result['nombre']?>" readonly ></td>
            </tr>                        
            <tr>
                <td>Veterinario</td>
                <td><input name="veterinario" value="<?php echo $result['nombres']?> <?php echo $result['apellidos']?>" readonly ></td>
            </tr>
            <tr>
                <td>Temperatura</td>
                <td><input name="temperatura" value="<?php echo $result['temperatura']?>"  ></td>
            </tr>
            <tr>
                <td>Peso</td>
                <td><input name="peso" value="<?php echo $result['peso']?>"  ></td>
            </tr>
            <tr>
                <td>Frecuencia respiratoria</td>
                <td><input name="frecrespiratoria" value="<?php echo $result['frecrespiratoria']?>"  ></td>
            </tr>
            <tr>
                <td>Frecuencia cardiaca</td>
                <td><input name="freccardiaca" value="<?php echo $result['freccardiaca']?>"  ></td>
            </tr>
            <tr>
                <td>Recomendaciones</td>
                <td><input name="recomendaciones" value="<?php echo $result['recomendaciones']?>"  ></td>
            </tr>
            <tr>
                        <td>Estado </td>
                        <td>
                            <select name="idestado">
                                <option value= "<?php echo $result['idestado']?>"><?php echo $result['estado']?></option>
                                <?php
                                $sql="SELECT * FROM estado WHERE idestado > 2";
                                $tp = mysqli_query($mysqli, $sql);
                                $estado = mysqli_fetch_assoc($tp);
                                do{           
                                ?>
                                <option value= "<?php echo($estado['idestado'])?>"><?php echo($estado['estado'])?></option>
                                <?php
                                }while($estado =mysqli_fetch_assoc($tp));
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                    <td><input type="submit" name="update" value="Update"></td>
                    <td><input type="submit" name="delete" value="Delete"></td>
                </tr>
        </form>
    </table>
    </body>
</html>