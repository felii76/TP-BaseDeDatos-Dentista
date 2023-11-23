<?php 
error_reporting(E_ERROR | E_PARSE);
    if ($_GET["turnoID"]){
        $turnoID = $_GET["turnoID"];
        
        $conn = mysqli_connect("localhost", "root", "", "dentista");

        $sql = "SELECT * FROM turnos WHERE turnoID = '$turnoID'";
        $consulta = $conn->query($sql); 
        $consultaTurno = mysqli_fetch_array($consulta);

        $sql = "";
        //$consulta = $conn->query($sql); 

        if ($_POST["nombre"] && $_POST["apellido"] && $_POST["telefono"] && $_POST["correo"] && $_POST["turno"] && $_POST["hora"]){
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];
            $turno = $_POST["turno"];
            $hora = $_POST["hora"];

            $sql = "UPDATE turnos SET Paciente = '$nombre', TipoTurno = '$turno', Hora = '$hora', correo = '$correo', telefono = '$telefono'";
            $consulta = $conn->query($sql);
            $resultado = 1;
        }
    } else {
        header("Location: index.html");
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
    <h4>Modifica tu turno</h4>

    <label for="nombres">Nombre completo:</label>
    <input class="controls" type="text" name="nombre" value="<?php echo $consultaTurno["Paciente"];?>" placeholder="Ingrese su Nombre" required>

    <label for="turno">Tratamiento:</label>
    <input class="controls" type="text" name="turno" value="<?php echo $consultaTurno["TipoTurno"];?>"placeholder="Tratamiento deseado" required>

    <label for="hora">Disponibilidad horaria:</label>
    <input class="controls" type="text" name="hora" value="<?php echo $consultaTurno["Hora"];?>" placeholder="Disponibilidad horaria" required>

    <label for="correo">Correo:</label>
    <input class="controls" type="email" name="correo" value="<?php echo $consultaTurno["correo"];?>" placeholder="Ingrese su Correo" required>

    <label for="telefono">Teléfono:</label>
    <input class="controls" type="tel" name="telefono" value="<?php echo $consultaTurno["telefono"];?>" placeholder="Telefono" required>

    <input type="submit" value="Sacar Turno"/>
    <p style="color: green;"><?php if ($resultado == 1){ echo "Acabas de generar un turno con: ".$nombre_completo_dentista.""; }?></p>
</form>

    </section>

</body>
</html>
