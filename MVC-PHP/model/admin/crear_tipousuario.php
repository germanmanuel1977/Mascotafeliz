
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM persona, tipousuario WHERE idpersona = '".$_SESSION['usuario']."' AND persona.idtipousua = tipousuario.idtipousua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>

<?php
if ((isset($_POST["btnguardar"]))&&($_POST["btnguardar"]=="frmadd")){
    $tp = $_POST['tipo_usuario'];
    $sqladd="SELECT * FROM tipousuario WHERE tipousua = '$tp' ";
    $query = mysqli_query($mysqli,$sqladd);
    $fila = mysqli_fetch_assoc($query);

if ($fila){
    echo '<script>alert ("El tipo de usuario ya existe");</script>';
    echo '<script>window.location="crear_tipousuario.php"</script>';
    
}elseif ($_POST['tipo_usuario']=="") {
    echo '<script>alert ("Existen campos vacios");</script>';
    echo '<script>window.location="crear_tipousuario.php"</script>';

}else{
    $tp = $_POST['tipo_usuario'];
    $sqladd="INSERT INTO tipousuario(tipousua) VALUES ('$tp') ";
    $query = mysqli_query($mysqli,$sqladd);
    echo '<script>alert ("Ingreso Exitoso");</script>';
    echo '<script>window.location="crear_tipousuario.php"</script>';


}

}
?>

<link rel="shortcut icon" href="../../../controller/img/mascotafeliz.png" type="image/x-icon">
<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombres']?></td>
    </tr>

    <tr><br>
        <td colspan='2' align="center">
        
        
            <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
            <input type="submit" formaction="../admin/index.php" value="Regresar" />
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
    <title>Formulario de Tipos de Usuarios</title>
</head>
    <body onload="frmadd.tipo_usuario.focus">
        <section class="title">
            <h1>Formulario de creación de tipos de usuarios   <?php echo $usua['tipousua']?></h1>
        </section>

        <table class="centrar" border=1>
            <form method="POST" name = "frmadd" autocomplete="off">
                
            </tr>
        
                <td colspan="2">Tipos de usuarios</td>
                       
             
            </tr>

            </tr>
        
                <td> id </td>
                <td> <input type="text" readonly> </td>
                       
             
            </tr>

            </tr>
        
                <td> Tipo de usuario </td>
                <td> <input type="text" name="tipo_usuario" placeholder="Ingrese tipo de usuario" style="text-transform:uppercase"> </td>
                       
             
            </tr>
            
            </tr>
        
                <td colspan="2">&nbsp; </td>
                       
             
            </tr>

            </tr>
        
                <td colspan="2"><input type="submit" name="btnadd" value="Guardar"> </td>
                <input type="hidden" name="btnguardar" value="frmadd">
                       
             
            </tr>            

            </form>


        </table>
    

    </body>
</html>