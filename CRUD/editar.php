<!DOCTYPE html>
<?php
include("conexion.php");
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>EDITAR</title>
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        // !aqui entra cuando se presiona el boton de enviar
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $nocontrol = $_POST['nocontrol'];

        $sql = "update alumnos set nombre='" . $nombre . "',
            nocontrol='" . $nocontrol . "' where id = '" . $id . "'";
        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo "<script language='JavaScript'>
            alert('Los datos se actualizaron correctamente');
            location.assign('index.php');
            </script>";
        } else {
            echo "<script language='JavaScript'>
            alert('Los datos NO se actualizaron');
            location.assign('index.php');
            </script>";
        }
        mysqli_close($conexion);
    } else {
        // !aqui entra si no se ha presionado el boton enviar
        $id = $_GET['id'];
        $sql = "select * from alumnos where id ='" . $id . "'";
        $resultado = mysqli_query($conexion, $sql);

        $fila = mysqli_fetch_assoc($resultado);
        $nombre = $fila["nombre"];
        $nocontrol = $fila["nocontrol"];

        mysqli_close($conexion);


    ?>
        <div class="container">
            <h1 class="text-center">Editar Alumno</h1>
            <form class="form-group row" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="">Nombre:</label>
                <input class="form-control form-control-lg" type="text" name="nombre" value="<?php echo $nombre; ?>">
                <br>
                <label for="">No. Control</label>
                <input class="form-control form-control-lg" type="text" name="nocontrol" value="<?php echo $nocontrol; ?>">
                <br>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <br>
                <div class="contenedor">
                <button type="submit" class="btn btn-success" name="enviar" value="ACTUALIZAR">ACTUALIZAR</button>
                    <a href="index.php" class="btn btn-primary">Regresar</a>
                </div>
            </form>
        </div>
    <?php
    }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>