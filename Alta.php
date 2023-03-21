<?php 

$nombre = trim($_POST['nombre']);
$apellido =  trim($_POST['apellido']);
$dni = trim($_POST['dni']);
$carrera =trim( $_POST['carrera']);
$id =trim( $_POST['IDTrue']);

if (isset($_POST['ingresar'])) {

 
  if (validar_datos($nombre, $apellido, $dni, $carrera)) {

    include('conexion.php');

    try {

      // si ya existe el dni en la tabla alumno...
      $stmt = $pdo->prepare("SELECT COUNT(*) FROM alumno WHERE DNI=:dni");
      $stmt->bindParam(':dni', $dni);
      $stmt->execute();
      $count = $stmt->fetchColumn();

      if ($count > 0) {
        //  ya existe en la tabla alumno
        echo '<script>alert("El dni ingresado ya se encuentra en la base de datos")</script>';
      } else {
        
        $stmt =  $pdo->prepare("INSERT INTO alumno (Nombre, Apellido, DNI, Carrera) VALUES (:Nombre, :Apellido, :DNI, :Carrera)");

        
        $stmt->bindParam(':Nombre', $nombre);
        $stmt->bindParam(':Apellido', $apellido);
        $stmt->bindParam(':DNI', $dni);
        $stmt->bindParam(':Carrera', $carrera);

      
        $stmt->execute();

        echo "Los datos se han ingresado correctamente en la base de datos.";
      }



    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

    $conn = null;
  }
}



if (isset($_POST['borrar'])) {

  include('Conexion.php');

  $consulta = "SELECT * FROM alumno WHERE id = :id";
  $statement = $pdo->prepare($consulta);
  $statement->execute(['id' => $id]);

  if ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
    $nombre = $fila['Nombre'];
    $apellido = $fila['Apellido'];


    $consulta = "DELETE FROM alumno WHERE id = :id";
    $statement = $pdo->prepare($consulta);
    $statement->execute(['id' => $id]);

    echo "Alumno eliminado correctamente";
  } else {
    echo "Error en la consulta";
  }
}

if (isset($_POST['editar'])) {

  include('Conexion.php');

  $consulta = "UPDATE alumno SET Nombre = :nombre, Apellido = :apellido, DNI = :dni, Carrera = :carrera WHERE id = :id";
  $statement = $pdo->prepare($consulta);
  $statement->execute(['nombre' => $nombre, 'apellido' => $apellido, 'dni' => $dni, 'carrera' => $carrera, 'id' => $id]);

  if ($statement->rowCount() > 0) {
    echo "Datos actualizados correctamente";
  } else {
    echo "No se actualizaron los datos";
  }
} else {
  echo "Error en la consulta";
}



function validar_datos($nombre, $apellido, $dni, $carrera) {
    // Validar campos vacíos
    if (empty($nombre) || empty($apellido) || empty($dni) || empty($carrera)) {
      echo "<p>Todos los campos son requeridos.</p>";
      return false;
    }
  
    // Validar nombre y apellido (no contienen números ni caracteres extraños)
    if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $nombre) || !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $apellido)) {
      echo "<p>El nombre y el apellido solo pueden contener letras y espacios.</p>";
      return false;
    }
  
    // Validar DNI (no tiene más de 8 dígitos)
    if (strlen($dni) > 8) {
      echo "<p>El DNI debe tener como máximo 8 dígitos.</p>";
      return false;
    }
  

  
    return true;
  }


?>