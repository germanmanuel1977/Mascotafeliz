<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM persona, tipousuario WHERE idpersona = '" . $_SESSION['usuario'] . "' AND persona.idtipousua = tipousuario.idtipousua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>

<?php
$sql = "SELECT * FROM tipousuario";
$tp_usu = mysqli_query($mysqli, $sql);
$usua1 = mysqli_fetch_assoc($usuarios);

$sql = "SELECT * FROM estado WHERE estado < 3";
$tp_usu2 = mysqli_query($mysqli, $sql);
$usua2 = mysqli_fetch_assoc($usuarios);


?>


<?php
if ((isset($_POST["btnguardar"])) && ($_POST["btnguardar"] == "frmadd")) {
    $tp = $_POST['doc'];
    $sqladd = "SELECT * FROM persona WHERE idpersona = '$tp' ";
    $query = mysqli_query($mysqli, $sqladd);
    $fila = mysqli_fetch_assoc($query);

    if ($fila) {
        echo '<script>alert ("El usuario ya existe");</script>';
        echo '<script>window.location="usuarios.php"</script>';
    } elseif ($_POST['doc'] == "" || $_POST['nom'] == "" || $_POST['ape'] == "" || $_POST['dir'] == "" || $_POST['tel'] == "" || $_POST['email'] == "" || $_POST['password'] == "" || $_POST['tarjetaprof'] == "") {
        echo '<script>alert ("Existen campos vacios");</script>';
        echo '<script>window.location="usuarios.php"</script>';
    } else {
        $doc = $_POST['doc'];
        $nombres = $_POST['nom'];
        $apellidos = $_POST['ape'];
        $direccion = $_POST['dir'];
        $telefono = $_POST['tel'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $tarjetaprof = $_POST['tarjetaprof'];
        $idtipousua = $_POST['idtipousua'];
        $idestado = $_POST['idestado'];




        $sqladd = "INSERT INTO persona(idpersona, nombres, apellidos, direccion, telefono, email, password, tarjetaprof, idtipousua, idestado) VALUES ('$doc','$nombres','$apellidos','$direccion','$telefono','$email','$password','$tarjetaprof','$idtipousua','$idestado')";
        $query = mysqli_query($mysqli, $sqladd);
        echo '<script>alert ("Ingreso Exitoso");</script>';
        echo '<script>window.location="usuarios.php"</script>';
    }
}
?>


<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombres'] ?></td>
    </tr>
    <tr><br>
        <td colspan='2' align="center">


            <input type="submit" value="Cerrar sesión" name="btncerrar" />
        </td>
        <input type="submit" formaction="../admin/index.php" value="Regresar" />
    </tr>
</form>

<?php

if (isset($_POST['btncerrar'])) {
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
        <h1>Formulario de creación de Mascotas <?php echo $usua['tipousua'] ?></h1>
    </section>

    <table class="centrar">
        <form method="POST" name="frmadd" autocomplete="off">

            </tr>

            <td colspan="2">Registro de Mascota</td>


            </tr>

            </tr>

            <td> Id de Mascota</td>
            <td> <input type="text" name="idmascota" placeholder="Ingrese el id de la Mascota"> </td>


            </tr>

            </tr>

            <td> Nombre </td>
            <td> <input type="text" name="nom" placeholder="Ingrese su nombre" style="text-transform:uppercase"> </td>


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

            <td> Id de especie </td>
            <td> <input type="number" name="idespecie" placeholder="Ingrese el id de la especie"> </td>


            </tr>

            </tr>

            <td> Id Persona </td>
            <td> <input type="text" name="idpersona" placeholder="Ingrese el Id de la persona"> </td>


            </tr>

            </tr>
            </tr>

            <td> id persona </td>
            <td>
                <select name="id_persona">
                    <option value=""> Selecciona una opción </option>
                    <?php
                    do {
                    ?>
                        <option value="<?php echo ($usua1['idpersona']) ?>"><?php echo ($usua1['nombres']) ?> </option>
                    <?php
                    } while ($usua1 = mysqli_fetch_assoc($tp_usu));
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
                    do {
                    ?>
                        <option value="<?php echo ($usua3['idmascota']) ?>"><?php echo ($usua3['nombre']) ?> </option>
                    <?php
                    } while ($usua3 = mysqli_fetch_assoc($tp_usu3));
                    ?>
                </select>
            </td>
            </tr>


            </tr>
            <td> especie </td>
            <td>
                <select name="id_especie">
                    <option value=""> Selecciona una opción </option>
                    <?php
                    do {
                    ?>
                        <option value="<?php echo ($usua2['idespecie']) ?>"><?php echo ($usua2['especie']) ?>
                        <?php
                    } while ($usua2 = mysqli_fetch_assoc($tp_usu2));
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