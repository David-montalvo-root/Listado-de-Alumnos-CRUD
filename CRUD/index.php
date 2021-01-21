<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Listado de Alumnos</title>
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estas seguro?, se eliminaran los datos.');
        }
    </script>
</head>

<body>
    <?php
    include("conexion.php");
    //select * from alumnos 
    $sql = "select * from alumnos";
    $resultado = mysqli_query($conexion, $sql);

    ?>
    <div class="container">
        <div class="text-center">
            <h1>Lista de Alumnos</h1>
            <a href="agregar.php" class="btn btn-primary">Nuevo Alumno</a>
            <br><br>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>No. Control</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($filas = mysqli_fetch_assoc($resultado)) {



                ?>
                    <tr>
                        <td> <?php echo $filas['id'] ?> </td>
                        <td> <?php echo $filas['nombre'] ?> </td>
                        <td> <?php echo $filas['nocontrol'] ?> </td>
                        <td>
                            <?php echo "<a href='editar.php?id=" . $filas['id'] . "'>EDITAR</a>"; ?>
                            <?php echo "<a href='eliminar.php?id=" . $filas['id'] . "' 
                         onclick='return confirmar()'>ELIMINAR</a>"; ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    mysqli_close($conexion);
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>