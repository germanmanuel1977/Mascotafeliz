
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM persona, tipousuario WHERE idpersona = '".$_SESSION['usuario']."' AND persona.idtipousua = tipousuario.idtipousua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>

<?php


?>


<?php
if ((isset($_POST["btnguardar"]))&&($_POST["btnguardar"]=="frmadd")){
    if ($_POST['idvisita']==""||$_POST['idmedicamento']=="")  {
        echo '<script>alert ("Existen campos vacios");</script>';
        echo '<script>window.location="crear_historia.php"</script>';
    
    }else{
    $idvisita = $_POST['idvisita'];
    $idmedicamento= $_POST['idmedicamento'];
    $sqladd="INSERT INTO historiaclinica(idvisita, idmedicamento) VALUES ('$idvisita','$idmedicamento')";
    $query = mysqli_query($mysqli,$sqladd);
    echo '<script>alert ("Ingreso Exitoso");</script>';
    echo '<script>window.location="crear_historia.php"</script>';

    }
}

?>


<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombres']?> <?php echo $usua['apellidos']?></td>
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
        <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
        <input type="submit" formaction="../veterinario/index.php" value="Regresar" />
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
            <h1>Formulario Creación Historia Clinica  <?php echo $usua['tipousua']?></h1>
        </section>

        <table class="centrar" border=1>
            <form method="POST" name = "frmadd" autocomplete="off">
                
            </tr>
        
                <td colspan="2">Historia Clinica</td>
                       
             
            </tr>


            </tr>
        
                <td> Visita </td>
                <td>
                    <select name="idvisita">
                        <option value=""> Selecciona una opción </option>
                        <?php
                        $sql = "SELECT * FROM visita ";
                        $tp = mysqli_query($mysqli,$sql);
                        $visita = mysqli_fetch_assoc($tp);
                        do {
                        ?>
                        <option value="<?php echo($visita['idvisita'])?>"><?php echo($visita['idvisita'])?> 
                        <?php
                        }while($visita=mysqli_fetch_assoc($tp));
                        ?>
                    </select>
                </td>
            </tr>

            </tr>
                <td> Medicamento </td>
                <td>
                    <select name="idmedicamento">
                        <option value=""> Selecciona una Opción </option>
                        <?php
                        $sql = "SELECT * FROM medicamento ";
                        $tp = mysqli_query($mysqli,$sql);
                        $medicamento = mysqli_fetch_assoc($tp);
                        do {
                        ?>
                        <option value="<?php echo($medicamento['idmedicamento'])?>"><?php echo($medicamento['medicamento'])?>
                        <?php
                        }while($medicamento=mysqli_fetch_assoc($tp));
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