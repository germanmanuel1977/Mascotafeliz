
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
    $tp = $_POST['especies'];
    //SELECT e.`idespecie`, e.`especie` FROM mascotafeliz.especie e;
    $sqladd="SELECT * FROM especie WHERE especie = '$tp' ";
    $query = mysqli_query($mysqli,$sqladd);
    $fila = mysqli_fetch_assoc($query);

if ($fila){
    echo '<script>alert ("la especie ya existe");</script>';
    echo '<script>window.location="crear_especie.php"</script>';
    
}elseif ($_POST['especies']=="") {
    echo '<script>alert ("Existen campos vacios");</script>';
    echo '<script>window.location="crear_especie.php"</script>';

}else{
    $tp = $_POST['especies'];
    //SELECT e.`idespecie`, e.`especie` FROM mascotafeliz.especie e;
    $sqladd="INSERT INTO especie(especie) VALUES ('$tp') ";
    $query = mysqli_query($mysqli,$sqladd);
    echo '<script>alert ("Ingreso Exitoso");</script>';
    echo '<script>window.location="crear_especie.php"</script>';


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
    <title>taller</title>
</head>
    <body onload="frmadd.tipousua.focus">
        <section class="title">
            <h1>Formulario de creación de Especies    <?php echo $usua['tipousua']?></h1>
        </section>

        <table class="centrar">
            <form method="POST" name = "frmadd" autocomplete="off">
                
            </tr>
        
                <td colspan="2">Tipos de especies</td>
                       
             
            </tr>

            </tr>
        
                <td> id </td>
                <td> <input type="text" readonly> </td>
                       
             
            </tr>

            </tr>
        
                <td> Especies </td>
                <td> <input type="text" name="especies" placeholder="Ingrese especie" style="text-transform:uppercase"> </td>
                       
             
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