<?php 
error_reporting(E_ERROR | E_PARSE);
  if ($_POST["nombre"] && $_POST["apellido"] && $_POST["telefono"] && $_POST["correo"] && $_POST["turno"] && $_POST["hora"]){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $turno = $_POST["turno"];
    $hora = $_POST["hora"];
    $conn = mysqli_connect("localhost", "root", "", "dentista");

    $sql = "SELECT nombre, apellido FROM dentistas ORDER BY RAND() LIMIT 1";
    $consulta = $conn->query($sql); 
    $dentista_random = mysqli_fetch_array($consulta);
    $nombre_completo_dentista = $dentista_random["nombre"] . ' ' . $dentista_random["apellido"];
    $nombre_completo = $nombre . ' ' . $apellido;

    $sql = "INSERT INTO turnos (Dentista, Paciente, TipoTurno, Hora, correo, telefono) VALUES ('$nombre_completo_dentista', '$nombre_completo', '$turno', '$hora', '$correo', '$telefono')";
    $consulta = $conn->query($sql); 

    $resultado = 1;
    
  } else {
    $nombre = "";
    $apellido = "";
    $telefono = "";
    $correo = "";
    $turno = "";
    $hora = "";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleturno.css">
  <title>Formulario Registro</title>
</head>
<body>

   
      <header>
        <a href="dentista.html"><img src="klipartz.com.png" width="7%"></a>

        <ul>
            <li><a href="dentista.html">Inicio</a></li>
            <li><a href="tratamientos.html">Tratamientos</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </header>


    <section class="">

    <form class="form-register" method="post">
    <h4>Saca tu turno</h4>

    <label for="nombres">Nombre:</label>
    <input class="controls" type="text" name="nombre" placeholder="Ingrese su Nombre" required>

    <label for="apellidos">Apellido:</label>
    <input class="controls" type="text" name="apellido" placeholder="Ingrese su Apellido" required>

    <label for="turno">Tratamiento:</label>
    <input class="controls" type="text" name="turno" placeholder="Tratamiento deseado" required>

    <label for="hora">Disponibilidad horaria:</label>
    <input class="controls" type="text" name="hora" placeholder="Disponibilidad horaria" required>

    <label for="correo">Correo:</label>
    <input class="controls" type="email" name="correo" placeholder="Ingrese su Correo" required>

    <label for="telefono">Teléfono:</label>
    <input class="controls" type="tel" name="telefono" placeholder="Telefono" required>

    <input type="submit" value="Sacar Turno"/>
    <p style="color: green;"  ><?php if ($resultado == 1){ echo "Acabas de generar un turno con: ".$nombre_completo_dentista.""; }?></p>
</form>

    </section>

</body>
</html>
