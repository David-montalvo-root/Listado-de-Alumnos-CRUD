<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Agregando Alumnos</title>
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $nocontrol = $_POST['nocontrol'];

        include("conexion.php");
        $sql = " insert into alumnos(nombre,nocontrol)
            values('" . $nombre . "','" . $nocontrol . "')";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo " <script language ='JavaScript'>
                        alert('Los datos fueron ingresados correctamente a la BD');
                        location.assign('index.php');
                        </script>";
        } else {
            echo " <script language ='JavaScript'>
                        alert('ERROR: Los datos NO fueron ingresados a la BD');
                        location.assign('index.php');
                        </script>";
        }
        mysqli_close($conexion);
    } else {
    }
    ?>
    <div class="container">
        <h1 class="text-center">Agregar Nuevo Alumno</h1>
        <form class="form-group row" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

            <label  for="">Nombre:</label>
            <input class="form-control form-control-lg" type="text" name="nombre">

            <br>

            <label  for="">Numero de Control:</label>
            <input class="form-control form-control-lg" type="text" name="nocontrol">

            <br>
            <div class="contenedor">
                <button type="submit" class="btn btn-success" name="enviar" value="AGREGAR">AGREGAR</button>

                <a href="index.php" class="btn btn-primary  ">Regresar</a>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>