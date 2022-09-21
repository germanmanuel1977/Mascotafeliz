
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM afiliacion, mascota WHERE idmascota = '".$_SESSION['usuario']."' AND afiliacion.idmascota = mascota.idmascota";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);
//se direcciona también

?>

<?php
$sql = "SELECT * FROM afiliacion";
$tp_usu = mysqli_query($mysqli,$sql);
$usua1 = mysqli_fetch_assoc($tp_usu);




?>


<?php
if ((isset($_POST["btnguardar"]))&&($_POST["btnguardar"]=="frmadd")){
    $tp = $_POST['idafi'];
    $sqladd="SELECT * FROM afiliacion WHERE idafiliacion = '$tp' ";
    $query = mysqli_query($mysqli,$sqladd);
    $fila = mysqli_fetch_assoc($query);

if ($fila){
    echo '<script>alert ("La afiliación ya existe");</script>';
    echo '<script>window.location="crear_afiliacion.php"</script>';
    
}elseif ($_POST['idafi']==""||$_POST['fechaafi']==""||$_POST['idmasc']==""){
    echo '<script>alert ("Existen campos vacios");</script>';
    echo '<script>window.location="crear_afiliacion.php"</script>';

}else{
    $idafi = $_POST['idafi'];
    $fechaafi = $_POST['fechaafi'];
    $idmascota = $_POST['idmasc'];
    



    $sqladd="INSERT INTO afiliacion(idafiliacion, fechaafi, idmascota) VALUES ('$idafi','$fechaafi','$idmascota')";
    $query = mysqli_query($mysqli,$sqladd);
    echo '<script>alert ("Ingreso Exitoso");</script>';
    echo '<script>window.location="crear_afiliacion.php"</script>';


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
    <title>taller</title>
</head>
    <body onload="frmadd.tipousua.focus">
        <section class="title">
            <h1>Formulario de afiliación <?php echo $usua['idafi']?></h1>
        </section>

        <table class="centrar">
            <form method="POST" name = "frmadd" autocomplete="off">
                
            </tr>
        
                <td colspan="2">Afiliación</td>
                       
             
            </tr>

            </tr>
        //autoincremental//
                <td> Código de afiliación </td>
                <td> <input type="number" name="idafi" placeholder="Ingrese el código de afiliación" > </td>
                       
             
            </tr>

            </tr>
        
                <td> Fecha afiliación </td>
                <td> <input type="date" name="fechaafi" placeholder="Ingrese fecha de afiliación" > </td>
                       
             
            </tr>

            </tr>
        
                <td> Código mascota </td>
                <td> <input type="number" name="idmasc" placeholder="Ingrese el código de la mascota" > </td>
                       
            </tr>
                  
                <td> Afiliación </td>
                <td>
                    <select name="idafiliacion">
                        <option value=""> Selecciona una opción </option>
                        <?php
                        do {
                        ?>
                        <option value="<?php echo($usua1['idafiliacion'])?>"><?php echo($usua1['idafiliacion'])?></option>
                        <?php
                        }while($usua1=mysqli_fetch_assoc($idafi));
                        ?>
                    </select>
                </td>
            </tr>

            </tr>
                <td> Fecha Afiliación </td>
                <td>
                    <select name="fechaafi">
                        <option value=""> Selecciona una opción </option>
                        <?php
                        do {
                        ?>
                        <option value="<?php echo($usua2['fechaafi'])?>"><?php echo($usua2['fechaafi'])?>
                        <?php
                        }while($usua2=mysqli_fetch_assoc($fechaafi));
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