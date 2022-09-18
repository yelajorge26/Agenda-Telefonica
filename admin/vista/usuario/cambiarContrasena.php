<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/Practica04-Mi-Agenda-Telefonica/admin/vista/css/formulario.css">
    <title>Modificar Contraseña</title>
</head>
<body>
    <?php

        $codigo = $_GET["codigo"];

    ?>

    <form id="formulario" method="POST" action="../../controladores/cambiarContrasena_norm.php">

        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
        <label for="contrasena">Contraseña Actual(*)</label>
        <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese la contraseña actual ..."/>
        <br>
        <label for="contrasena">Contraseña Nueva(*)</label>
        <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese la nueva contraseña ..."/>
        <br>
        <input class="botones" type="submit" id="modificar" name="modificar" value="Modificar" />
        <input class="botones" type="reset" id="cancelar" name="concelar" value="Cancelar" />

    </form>
</body>
</html>