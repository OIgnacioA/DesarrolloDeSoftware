<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./estilo.css">
  <title>Formulario de Alumnos</title>
  <script src="./validaciones.js"></script>
</head>

<body>
  <div class="container">

    <h2>Formulario de Alumnos</h2>

    <form method="post" action="index.php" name="formulario1" id="miFormulario">

      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">


      <label for="apellido">Apellido:</label>
      <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido">


      <label for="dni">DNI:</label>
      <input type="text" id="dni" name="dni" placeholder="Ingrese su DNI">


      <label for="carrera">Carrera:</label>
      <select id="carrera" name="carrera">
        <option value="matematicas">Matematicas</option>
        <option value="literatura">Literatura</option>
        <option value="artesoscuras">Artes Oscuras</option>
      </select>

      <div class="btn-group"> <!--alta -->

        <button class="boton-estilo" name="ingresar" value="" onclick="consulta3()">Ingresar Alumno</button>



        <button class="boton-estilo-limpiar" type="reset" onclick="limpiar()">Limpiar</button>


      </div><br>
      <hr>

      <div class="btn-group">

        <label for="dni">Id del Alumno: (Borrar - Editar -Traer):</label>
        <input type="text" id="ID" name="ID" placeholder="Ingrese Id">

        <input type="hidden" id="IDTrue" name="IDTrue">

        <input type="submit" name="traer" value="Traer Alumno ">


        <button class="boton-estilo" name="borrar" value="" onclick="consulta()">Borrar Alumno</button>
        <button class="boton-estilo" name="editar" value="" onclick="consulta2()">Editar Alumno</button><br> <br>
        <input type="submit" name="listado" value=" Ver Listado Completo">
      </div>

    </form>


  </div>

</body>


<?php


// Alta --------------------------------------------------------------
if (isset($_POST['ingresar']) || isset($_POST['borrar']) || isset($_POST['editar'])) {

  include('Alta.php');
}


// Vista--------------------------------------------------------------

if (isset($_POST['listado'])) {
  session_start();
  $_SESSION['origen'] = 'index.php';

  header('Location: listado.php');
  exit();
}

// Acercar Data------------------------------------------------------
if (isset($_POST['traer'])) {

  include('Conexion.php');

  $ID = $_POST['ID'];

  $consulta = "SELECT * FROM alumno WHERE id =:id";
  $statement = $pdo->prepare($consulta);
  $statement->execute(['id' => $ID]);

  if ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
    $nombre = $fila['Nombre'];
    $apellido = $fila['Apellido'];
    $dni = $fila['DNI'];
    $carrera = $fila['Carrera'];
    $id = $fila['id'];

    $alumno = true;
  } else {
    echo "Error en la consulta";
  }
}
?>

<!-- Actualizacion por pantalla.-->
<script>
  <?php if (isset($alumno)) { ?>
    document.getElementById("nombre").value = "<?php echo $nombre; ?>";
    document.getElementById("apellido").value = "<?php echo $apellido; ?>";
    document.getElementById("dni").value = "<?php echo $dni; ?>";
    document.getElementById("carrera").value = "<?php echo $carrera; ?>";
    document.getElementById("IDTrue").value = "<?php echo $id; ?>";
  <?php } ?>
</script>



</html>