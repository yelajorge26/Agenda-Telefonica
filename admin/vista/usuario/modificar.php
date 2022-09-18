<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/Practica04-Mi-Agenda-Telefonica/admin/vista/css/formulario.css">
    <title>Modificar Datos Persona</title>
</head>
<body>
    <?php

        $codigo = $_GET["codigo"];

        $sql = "SELECT * FROM usuario WHERE usu_codigo = $codigo";

        include '../../../config/conexioBD.php';

        $result = $conn->query($sql);

        if($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
            ?>

               <section class="registro">
                    <form id="formulario" method="POST" action="../../controladores/modificar_norm.php">

                        <input class="controles" type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                        <label for="cedula">Cedula(*)</label>
                        <input class="controles" type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" required placeholder="Ingrese la cedula ..."/>
                        <br>
                        <label for="nombres">Nombres(*)</label>
                        <input class="controles" type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" required placeholder="Ingrese los nombres ..."/>
                        <br>
                        <label for="apellidos">Apellidos(*)</label>
                        <input class="controles" type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" required placeholder="Ingrese los apellidos ..."/>
                        <br>
                        <label for="direccion">Direccion(*)</label>
                        <input class="controles" type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" required placeholder="Ingrese la direccion ..."/>
                        <br>
                        <label for="nombres">Correo(*)</label>
                        <input class="controles" type="text" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" required placeholder="Ingrese la correo ..."/>
                        <br>
                        <input class="botones" type="submit" id="modificar" name="modificar" value="Modificar" />
                        <input class="botones" type="reset" id="cancelar" name="concelar" value="Cancelar" />

                    </form>
               </section>

                <?php

            }

        } else {

            echo "<p>Ha ocurrido un error inesperado !</p>";
            echo "<p>" . mysqli_error($conn) . "</p>";

        }

        $conn->close();
    
    ?>

</body>
</html>