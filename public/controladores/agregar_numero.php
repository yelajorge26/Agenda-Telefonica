<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Numero a la cuenta</title>
</head>
<body>
    
    <?php

        include '../../config/conexioBD.php';

        $cedulaCode = $_GET['cedula'];
        $numero = $_GET['numero'];
        $operadora = $_GET['operadora'];

        $sql = "SELECT usu_codigo FROM usuario WHERE usu_cedula='$cedulaCode'";

        $result = $conn->query($sql);

        if($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                $newCode = $row["usu_codigo"];

            }

            echo $newCode;

            $sql1 = "INSERT INTO telefono VALUES (0, '$numero', '$operadora', $newCode)";

            //$result1 = $conn->query($sql1);

            if ($conn->query($sql1) === TRUE) {

                echo "<p>El numero se ha creado exitosamente !!!</p>";
    
                header("Location: /Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html");
    
            }

        }

    ?>

</body>
</html>