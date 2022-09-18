<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos de persona</title>
 <link rel="stylesheet" href="/Practica04-Mi-Agenda-Telefonica/admin/vista/css/formulario.css">
</head>
<body>
 <?php

session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
header("Location: /Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html");
}

 $cedula =  isset($_POST["Ecedula"]) ? trim($_POST["Ecedula"]) : null;
 $sql = "SELECT * FROM usuario where usu_cedula LIKE '%" .$cedula. "%'";
 include '../../config/conexioBD.php'; 
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
    <section class="registro">
        <form id="formulario" method="POST" action="../../admin/controladores/eliminar.php">
        <label for="codigo">Codigo</label>
        <input type="text" class="controles" name="codigo" value="<?php echo $row["usu_codigo"]; ?>"/>
        <br>
        <label for="cedula">Cedula</label>
        <input type="text" class="controles" name="cedulacodigo" value="<?php echo $row["usu_cedula"]; ?>"
        disabled/>
        <br>
        <label for="nombres">Nombres</label>
        <input type="text" class="controles" name="nombres" value="<?php echo $row["usu_nombres"];
        ?>" disabled/>
        <br>
        <label for="apellidos">Apelidos</label>
        <input type="text" class="controles" name="apellidos" value="<?php echo $row["usu_apellidos"];
        ?>" disabled/>
        <br>
        <label for="direccion">Dirección</label>
        <input type="text" class="controles" name="direccion" value="<?php echo $row["usu_direccion"];
        ?>" disabled/>
        <br>
        <label for="correo">Correo electrónico</label>
        <input type="email" class="controles" name="correo" value="<?php echo $row["usu_correo"]; ?>"
        disabled/>
        <br>

        <input type="submit" class="botones" name="eliminar" value="Eliminar" />
        <input type="reset" class="botones" name="cancelar" value="Cancelar" />
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
