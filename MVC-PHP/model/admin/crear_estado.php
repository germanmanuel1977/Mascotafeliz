
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
    $tp = $_POST['estado'];
    $sqladd="SELECT * FROM estado WHERE estado = '$tp' ";
    $query = mysqli_query($mysqli,$sqladd);
    $fila = mysqli_fetch_assoc($query);

if ($fila){
    echo '<script>alert ("El Estado ya existe");</script>';
    echo '<script>window.location="crear_estado.php"</script>';
    
}elseif ($_POST['estado']=="") {
    echo '<script>alert ("Existen campos vacios");</script>';
    echo '<script>window.location="crear_estado.php"</script>';

}else{
    $tp = $_POST['estado'];
    $sqladd="INSERT INTO estado(estado) VALUES ('$tp') ";
    $query = mysqli_query($mysqli,$sqladd);
    echo '<script>alert ("Ingreso Exitoso");</script>';
    echo '<script>window.location="crear_estado.php"</script>';


}

}
?>


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
    <title>Formulario de Estados</title>
</head>
    <body onload="frmadd.tipousua.focus">
        <section class="title">
            <h1>Formulario de creación de estados    <?php echo $usua['tipousua']?></h1>
        </section>

        <table class="centrar" border=1>
            <form method="POST" name = "frmadd" autocomplete="off">
                
            </tr>
        
                <td colspan="2">Estados</td>
                       
             
            </tr>

            </tr>
        
                <td> id </td>
                <td> <input type="text" readonly> </td>
                       
             
            </tr>

            </tr>
        
                <td> Estado </td>
                <td> <input type="text" name="estado" placeholder="Ingrese Estado" style="text-transform:uppercase"> </td>
                       
             
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