
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM persona, tipousuario WHERE idpersona = '".$_SESSION['usuario']."' AND persona.idtipousua = tipousuario.idtipousua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>

<?php


$sql = "SELECT * FROM estado WHERE idestado > 2";
$tp_usu2 = mysqli_query($mysqli,$sql);
$usua2 = mysqli_fetch_assoc($usuarios);




?>


<?php
if ((isset($_POST["btnguardar"]))&&($_POST["btnguardar"]=="frmaddvisita")){
    if ($_POST['fecha']==""||$_POST['hora']==""||$_POST['temperatura']==""||$_POST['peso']==""||$_POST['frecrespiratoria']==""||$_POST['freccardiaca']==""||$_POST['recomendaciones']==""||$_POST['vrconsulta']==""||$_POST['id_persona']==""||$_POST['id_mascota']==""||$_POST['id_estado']=="")  {
    echo '<script>alert ("Existen campos vacios");</script>';
    echo '<script>window.location="crear_visita.php"</script>';

}else{
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $temperatura = $_POST['temperatura'];
    $peso = $_POST['peso'];
    $frecrespiratoria = $_POST['frecrespiratoria'];
    $freccardiaca = $_POST['freccardiaca'];
    $recomendaciones = $_POST['recomendaciones'];
    $vrconsulta = $_POST['vrconsulta'];
    $idpersona = $_POST['id_persona'];
    $idmascota = $_POST['id_mascota'];
    $idestado = $_POST['id_estado'];


    $sqladd="INSERT INTO visita(fecha, hora, temperatura, peso, frecrespiratoria, freccardiaca, recomendaciones, vrconsulta, idpersona, idmascota, idestado) VALUES ('$fecha', '$hora', '$temperatura', '$peso', '$frecrespiratoria', '$freccardiaca', '$recomendaciones', '$vrconsulta', '$idpersona', '$idmascota', '$idestado') ";
    $query = mysqli_query($mysqli,$sqladd);
    echo '<script>alert ("Ingreso Exitoso");</script>';
    echo '<script>window.location="crear_visita.php"</script>';


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
    <body onload="frmaddvisita.temperatura.focus">
        <section class="title">
            <h1>Formulario de creación de visitas <?php echo $usua['tipousua']?></h1>
        </section>

        <table class="centrar">
            <form method="POST" name = "frmaddvisita" autocomplete="off">
                
            </tr>
        
                <td colspan="2">Registro de visita</td>
                       
             
            </tr>

            </tr>
        
                <td> id de visita </td>
                <td> <input type="text" readonly> </td>
                       
             
            </tr>

            </tr>
        
                <td> fecha </td>
                <td> <input type="date" name="fecha" placeholder="Fecha de visita" style="text-transform:uppercase"> </td>
                       
             
            </tr>

            </tr>
        
                <td> hora </td>
                <td> <input type="time" name="hora" placeholder="Hora de visita" style="text-transform:uppercase"> </td>
                       
             
            </tr>

            </tr>
        
                <td> temperatura </td>
                <td> <input type="number" name="temperatura" placeholder="Ingrese temperatura"> </td>
                       
             
            </tr>

            </tr>
        
                <td> peso </td>
                <td> <input type="number" name="peso" placeholder="Ingrese peso"> </td>
                       
             
            </tr>

            </tr>
        
                <td> frecuencia respiratoria </td>
                <td> <input type="number" name="frecrespiratoria" placeholder="Ingrese frecuencia respiratoria"> </td>
                       
             
            </tr>

            </tr>
        
                <td> frecuencia cardiaca </td>
                <td> <input type="number" name="freccardiaca" placeholder="Ingrese frecuencia cardiaca"> </td>
                       
             
            </tr>

            </tr>
        
                <td> recomendaciones </td>
                <td> <input type="text" name="recomendaciones" placeholder="Ingrese recomendaciones" style="text-transform:uppercase" > </td>
                       
             
            </tr>

            </tr>
        
                <td> valor consulta </td>
                <td> <input type="number" name="vrconsulta" placeholder="Ingrese valor de consulta" value="0"> </td>
                       
             
            </tr>

            </tr>
        
                <td> id persona </td>
                <td>
                    <select name="id_persona">
                        <option value=""> Selecciona una opción </option>
                        <?php
                        $sql = "SELECT * FROM persona WHERE idtipousua = 2";
                        $tp_usu = mysqli_query($mysqli,$sql);
                        $usua1 = mysqli_fetch_assoc($tp_usu);
                        do {
                        ?>
                        <option value="<?php echo($usua1['idpersona'])?>"><?php echo($usua1['nombres'])?> </option>
                        <?php
                        }while($usua1=mysqli_fetch_assoc($tp_usu));
                        ?>
                    </select>
                </td>
            </tr>
            </tr>
        
                <td> id mascota </td>
                <td>
                    <select name="id_mascota">
                        <option value=""> Selecciona una opción </option>
                        <?php
                        $sql = "SELECT * FROM mascota";
                        $tp_usu3 = mysqli_query($mysqli,$sql);
                        $usua3 = mysqli_fetch_assoc($tp_usu3);
                        do {
                        ?>
                        <option value="<?php echo($usua3['idmascota'])?>"><?php echo($usua3['nombre'])?> </option>
                        <?php
                        }while($usua3=mysqli_fetch_assoc($tp_usu3));
                        ?>
                    </select>
                </td>
            </tr>

            </tr>
                <td> estado </td>
                <td>
                    <select name="id_estado">
                        <option value=""> Selecciona una opción </option>
                        <?php
                        do {
                        ?>
                        <option value="<?php echo($usua2['idestado'])?>"><?php echo($usua2['estado'])?>
                        <?php
                        }while($usua2=mysqli_fetch_assoc($tp_usu2));
                        ?>
                    </select>
                </td>
            </tr>
                                                                                                  
            </tr>
        
                <td colspan="2">&nbsp; </td>
                       
             
            </tr>

            </tr>
        
                <td colspan="2"><input type="submit" name="btnadd" value="Guardar"> </td>
                <input type="hidden" name="btnguardar" value="frmaddvisita">
                       
             
            </tr>            

            </form>


        </table>
    

    </body>
</html>