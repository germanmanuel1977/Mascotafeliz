<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php"); 
$sql="SELECT * FROM persona, tipousuario, estado WHERE persona.idtipousua = tipousuario.idtipousua AND persona.idestado = estado.idestado AND persona.idpersona = '".$_GET['id']."'";
$query=mysqli_query($mysqli,$sql);
$result=mysqli_fetch_assoc($query)
?>

<?php 
if(isset($_POST["update"]))
{
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $direccion=$_POST['direccion'];
    $idtipousua=$_POST['idtipousua'];
    $idestado=$_POST['idestado'];
    $sql_update="UPDATE persona SET nombres = '$nombres', apellidos = '$apellidos', direccion = '$direccion', idtipousua = '$idtipousua', idestado = '$idestado'  WHERE idpersona = '".$_GET['id']."'";
    $cs=mysqli_query($mysqli, $sql_update);  
   echo '<script>alert (" Actualización Exitosa ");</script>';
}
elseif(isset($_POST["delete"]))
{
    $sqldelete="DELETE FROM persona WHERE idpersona='".$_GET['id']."'";
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
    <title>Agregar Usuario</title>
</head>
    <body onload="centrar();">
    <table>
        <form name = "consult" method="POST" autocomplete="off">
            <tr>
                <td>Documento</td>
                <td><input name="idpersona" value="<?php echo $result['idpersona']?>" readonly ></td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td><input name="nombres" value="<?php echo $result['nombres']?>"></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input name="apellidos" value="<?php echo $result['apellidos']?>"  ></td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td><input name="direccion" value="<?php echo $result['direccion']?>"></td>
            </tr>
            <tr>
                <td>Tipo de usuario</td>
                <td> <select name="idtipousua">
                                <option value= "<?php echo $result['idtipousua']?>"> <?php echo $result['tipousuario']?> </option>
                                <?php
                                $sql="SELECT * FROM tipousuario";
                                $tp = mysqli_query($mysqli, $sql);
                                $tipousuario = mysqli_fetch_assoc($tp);
                                do{ 
                                ?>
                                <option value= "<?php echo($tipousuario['idtipousua'])?>"><?php echo($tipousuario['tipousua'])?></option>
                                <?php
                                }while($tipousuario =mysqli_fetch_assoc($tp));
                                ?>
                            </select></td>
            </tr>
            <tr>
                        <td>Estado </td>
                        <td>
                            <select name="idestado">
                                <option value= "<?php echo $result['idestado']?>"><?php echo $result['estado']?></option>
                                <?php
                                $sql="SELECT * FROM estado";
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