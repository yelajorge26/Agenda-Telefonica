<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Datos Persona</title>
</head>
<body>
    <?php
    
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html");
    }


    include '../../config/conexioBD.php';

    $codigo = $_POST["codigo"];
    
    $sql = "DELETE FROM usuario WHERE usu_codigo = $codigo";

    if($conn->query($sql) === TRUE) {
        echo "<p>Se ha eliminado los datos correctamente !!!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }

    echo "<a href='../../public/vista/html/index.html'>Regresar</a>";

    $conn->close();

    ?>

</body>
</html>