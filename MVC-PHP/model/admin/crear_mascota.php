<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM persona, tipousuario WHERE idpersona = '" . $_SESSION['usuario'] . "' AND persona.idtipousua = tipousuario.idtipousua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>

<?php
$sql = "SELECT * FROM persona";
$tp_usu = mysqli_query($mysqli,$sql);
$usua1 = mysqli_fetch_assoc($usuarios);


?>


<?php
if ((isset($_POST["btnguardar"])) && ($_POST["btnguardar"] == "frmadd")) {
    $tp = $_POST['idmascota'];
    $sqladd = "SELECT * FROM mascota WHERE idmascota = '$tp' ";
    $query = mysqli_query($mysqli, $sqladd);
    $fila = mysqli_fetch_assoc($query);

    if ($fila) {
        echo '<script>alert ("La mascota ya existe");</script>';
        echo '<script>window.location="crear_mascota.php"</script>';
    } elseif ($_POST['idmascota'] == "" || $_POST['nombre'] == "" || $_POST['color'] == "" || $_POST['raza'] == "" || $_POST['idespecie'] == "" || $_POST['idpersona'] == "") {
        echo '<script>alert ("Existen campos vacios");</script>';
        echo '<script>window.location="crear_mascota.php"</script>';
    } else {
        $idmascota = $_POST['idmascota'];
        $nombre = $_POST['nombre'];
        $color = $_POST['color'];
        $raza = $_POST['raza'];
        $idespecie = $_POST['idespecie'];
        $idpersona = $_POST['idpersona'];

        $sqladd = "INSERT INTO mascota(idmascota, nombre, color, raza, idespecie, idpersona) VALUES ('$idmascota','$nombre','$color','$raza','$idespecie','$idpersona')";
        $query = mysqli_query($mysqli, $sqladd);
        echo '<script>alert ("Ingreso Exitoso");</script>';
        echo '<script>window.location="crear_mascota.php"</script>';
    }
}
?>


<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombres'] ?></td>
    </tr>

    <tr><br>
        <td colspan='2' align="center">
        
        
            <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
            <input type="submit" formaction="../admin/index.php" value="Regresar" />
    </tr>
    
</form>

<?php

if (isset($_POST['btncerrar'])) {
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
    <title>Formulario de Mascotas</title>
</head>

<body onload="frmadd.tipousua.focus">
    <section class="title">
        <h1>Formulario de creación de Mascotas <?php echo $usua['tipousua'] ?></h1>
    </section>

    <table class="centrar" border = 1>
        <form method="POST" name="frmaddmascota" autocomplete="off">

            </tr>

                <td colspan="2">Registro de Mascota</td>


            </tr>

            </tr>

                <td> Id de Mascota</td>
                <td> <input type="text" name="idmascota" placeholder="Ingrese el id de la Mascota"> </td>


            </tr>

            </tr>

                <td> Nombre </td>
                <td> <input type="text" name="nombre" placeholder="Ingrese su nombre" style="text-transform:uppercase"> </td>


            </tr>

            </tr>

                <td> Color </td>
                <td> <input type="text" name="color" placeholder="Ingrese el color de su mascota" style="text-transform:uppercase"> </td>


            </tr>

            </tr>

                <td> Raza </td>
                <td> <input type="text" name="raza" placeholder="Ingrese la raza de su mascota" style="text-transform:uppercase"> </td>


            </tr>

            </tr>

                <td> id especie </td>
                <td>
                    <select name="idespecie">
                        <option value=""> Selecciona una opción </option>
                        <?php
                        $sql = "SELECT * FROM especie";
                        $tp = mysqli_query($mysqli, $sql);
                        $especie1 = mysqli_fetch_assoc($tp);
                        do {
                        ?>
                            <option value="<?php echo ($especie1['idespecie']) ?>"><?php echo ($especie1['especie']) ?> </option>
                        <?php
                        } while ($especie1 = mysqli_fetch_assoc($tp));
                        ?>
                    </select>
                </td>
            </tr>

            </tr>

                <td> id persona </td>
                <td>
                    <select name="idpersona">
                        <option value=""> Selecciona una opción </option>
                        <?php
                        $sql = "SELECT * FROM persona WHERE idtipousua = 3";
                        $tp = mysqli_query($mysqli, $sql);
                        $persona = mysqli_fetch_assoc($tp);
                        do {
                        ?>
                            <option value="<?php echo ($persona['idpersona']) ?>"><?php echo ($persona['nombres']) ?> <?php echo ($persona['apellidos']) ?> </option>
                        <?php
                        } while ($persona = mysqli_fetch_assoc($tp));
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