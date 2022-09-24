<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php"); 
$sql="SELECT * FROM mascota, persona, especie WHERE mascota.idpersona = persona.idpersona AND mascota.idespecie = especie.idespecie AND mascota.idmascota = '".$_GET['id']."'";
$query=mysqli_query($mysqli,$sql);
$result=mysqli_fetch_assoc($query)
?>

<?php 
if(isset($_POST["update"]))
{
    $nombre=$_POST['nombre'];
    $color=$_POST['color'];
    $raza=$_POST['raza'];
    $idespecie=$_POST['idespecie'];
    $idpersona=$_POST['idpersona'];
    $sql_update="UPDATE mascota SET nombre = '$nombre', color = '$color', raza = '$raza', idespecie = '$idespecie', idpersona = '$idpersona'  WHERE idmascota = '".$_GET['id']."'";
    $cs=mysqli_query($mysqli, $sql_update);  
   echo '<script>alert (" Actualización Exitosa ");</script>';
}
elseif(isset($_POST["delete"]))
{
    $sqldelete="DELETE FROM mascota WHERE idmascota ='".$_GET['id']."'";
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
    <title>Actualización información de mascota</title>
</head>
    <body onload="centrar();">
    <table>
        <form name = "consult" method="POST" autocomplete="off">
            <tr>
                <td>Idmascota</td>
                <td><input name="idmascota" value="<?php echo $result['idmascota']?>" readonly ></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input name="nombre" value="<?php echo $result['nombre']?>"></td>
            </tr>
            <tr>
                <td>Color</td>
                <td><input name="color" value="<?php echo $result['color']?>"  ></td>
            </tr>
            <tr>
                <td>Raza</td>
                <td><input name="raza" value="<?php echo $result['raza']?>"></td>
            </tr>
            <tr>
                <td>Especie</td>
                <td> <select name="idespecie">
                                <option value= "<?php echo $result['idespecie']?>"> <?php echo $result['especie']?> </option>
                                <?php
                                $sql="SELECT * FROM especie";
                                $tp = mysqli_query($mysqli, $sql);
                                $especie = mysqli_fetch_assoc($tp);
                                do{ 
                                ?>
                                <option value= "<?php echo($especie['idespecie'])?>"><?php echo($especie['especie'])?></option>
                                <?php
                                }while($especie =mysqli_fetch_assoc($tp));
                                ?>
                            </select></td>
            </tr>
            <tr>
                        <td>Propietario </td>
                        <td>
                            <select name="idpersona">
                                <option value= "<?php echo $result['idpersona']?>"><?php echo $result['nombres']?> <?php echo $result['apellidos']?></option>
                                <?php
                                $sql="SELECT * FROM persona WHERE idtipousua = 3";
                                $tp = mysqli_query($mysqli, $sql);
                                $persona = mysqli_fetch_assoc($tp);
                                do{           
                                ?>
                                <option value= "<?php echo($persona['idpersona'])?>"><?php echo($persona['nombres'])?> <?php echo($persona['apellidos'])?></option>
                                <?php
                                }while($persona =mysqli_fetch_assoc($tp));
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