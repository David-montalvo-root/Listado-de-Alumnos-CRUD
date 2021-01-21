<?php
$id = $_GET['id'];
include("conexion.php");

$sql = "delete from alumnos where id='" . $id . "'";
$resultado = mysqli_query($conexion, $sql);

if($resultado){
    echo "<script language='Javascript'>
        alert('Los datos se eliminaron correctamente de la BD');
        location.assign('index.php');
        </script>";
    
    

}else{
    echo "<script language='Javascript'>
    alert('Los datos NO se eliminaron correctamente de la BD');
    location.assign('index.php');
    </script>";

}


?>