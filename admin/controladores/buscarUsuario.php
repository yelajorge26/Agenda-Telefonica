<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos de persona</title>
 
</head>
<body>
 <?php
 
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: /Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html");
 }


 $cedula =  isset($_POST["BuscarCedula"]) ? trim($_POST["BuscarCedula"]) : null;
 $sql = "SELECT * FROM usuario where usu_cedula LIKE '%" .$cedula. "%'";
 include '../../config/conexioBD.php'; 
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form class="registro" method="POST" action="../../admin/vista/html/ventana_admin.php">
 <label for="codigo">Codigo (*)</label>
 <input type="text" id="codigo" name="codigo" value="<?php echo $row["usu_codigo"]; ?>" disabled/>
 <br>
 <label for="cedula">Cedula (*)</label>
 <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"
disabled/>
 <br>
 <label for="nombres">Nombres (*)</label>
 <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];
?>" disabled/>
 <br>
 <label for="apellidos">Apelidos (*)</label>
 <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];
?>" disabled/>
 <br>
 <label for="direccion">Dirección (*)</label>
 <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];
?>" disabled/>
 <br>
 <label for="correo">Correo electrónico (*)</label>
 <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>"
disabled/>
 <br>

 <input type="submit" id="eliminar" name="Aceptar" value="Aceptar" />
 </form>
 <?php
 }
 } else {
 echo '<script language="javascript">alert("Usuario no Existente"); window.location.href="../../admin/vista/html/ventana_admin.php"</script>';
 echo "<p>" . mysqli_error($conn) . "</p>";
 }
 $conn->close();
 ?>
</body>
</html>