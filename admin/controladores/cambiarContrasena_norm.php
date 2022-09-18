<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cambiar contrasena</title>
</head>
<body>
    <?php

        include '../../config/conexioBD.php';

        $codigo = $_POST["codigo"];
        $contrasena1 = isset($_POST["contrasena1"]) ? trim($_POST["contrasena1"]) : null;
        $contrasena2 = isset($_POST["contrasena2"]) ? trim($_POST["contrasena2"]) : null;

        $sql = "UPDATE usuario SET usu_contrasena=MD5('$contrasena2') WHERE usu_codigo = $codigo";
        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">alert("Usuario Editado Exitosamente"); window.location.href="../../public/vista/html/index.html"</script>';
        } else {
            echo '<script language="javascript">alert("Usuario no encontrado o Cedula Incorrecta"); window.location.href="../../public/vista/html/index.html"</script>';
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
        }

        echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
        $conn->close();

    ?>
</body>
</html>