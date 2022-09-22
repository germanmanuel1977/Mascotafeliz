
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM persona, tipousuario WHERE idpersona = '".$_SESSION['usuario']."' AND persona.idtipousua = tipousuario.idtipousua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>

<?php
$sql = "SELECT * FROM mascota ";
$tp_usu1 = mysqli_query($mysqli,$sql);
$usua1 = mysqli_fetch_assoc($tp_usu1);
?>


<?php
if ((isset($_POST["btnguardar"]))&&($_POST["btnguardar"]=="frmadd")){
    $idmascota= $_POST['idmascota'];
    $sqladd="SELECT * FROM afiliacion WHERE idmascota = $idmascota ";
    $query = mysqli_query($mysqli,$sqladd);
    $fila = mysqli_fetch_assoc($query);

if ($fila){
    echo '<script>alert ("La mascota ya está afiliada");</script>';
    echo '<script>window.location="crear_afiliacion.php"</script>';
    
}elseif ($_POST['fechaafi']==""||$_POST['idmascota']=="")  {
    echo '<script>alert ("Existen campos vacios");</script>';
    echo '<script>window.location="crear_afiliacion.php"</script>';

}else{
    $fechaafi = $_POST['fechaafi'];
    $idmascota= $_POST['idmascota'];
    $sqladd="INSERT INTO afiliacion(fechaafi, idmascota) VALUES ('$fechaafi','$idmascota')";
    $query = mysqli_query($mysqli,$sqladd);
    echo '<script>alert ("Ingreso Exitoso");</script>';
    echo '<script>window.location="crear_afiliacion.php"</script>';

    

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
    <title>Formulario Afiliación de Mascota</title>
</head>
    <body onload="frmadd.tipousua.focus">
        <section class="title">
            <h1>Afiliación de Mascota <?php echo $usua['tipousua']?></h1>
        </section>

        <table class="centrar">
            <form method="POST" name = "frmadd" autocomplete="off">
                
            </tr>
        
                <td colspan="2"> A F I L I A C I Ó N</td>
                       
             
            </tr>

            </tr>
       
                <td> Fecha de afiliación </td>
                <td> <input type="date" name="fechaafi" placeholder="Ingrese fecha Afiliacion"> </td>
                       
             
            </tr>

            </tr>
                          
                <td> Mascota </td>
                <td>
                    <select name="idmascota">
                        <option value=""> Selecciona una opción </option>
                        <?php
                        do {
                        ?>
                        <option value="<?php echo($usua1['idmascota'])?>"><?php echo($usua1['nombre'])?>
                        <?php
                        }while($usua1=mysqli_fetch_assoc($tp_usu1));
                        ?>
                    </select>
                </td>
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