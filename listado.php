
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./estilo.css">

</head>


<?php

session_start();
if(isset($_SESSION['origen']) && $_SESSION['origen'] === 'index.php'){

  include('conexion.php');

  $stmt = $pdo->query('SELECT id, Nombre, Apellido, DNI, Carrera FROM alumno');

  echo "<div style='text-align:center; background-color:#c5e7c5; padding:20px; width:100vw; height:100vh; display:flex; justify-content:center; align-items:center;'>
    <div style='width:80%; height:80%; background-color:#fff; border-radius:10px; padding:20px;'>
    <h2>Datos ingresados:</h2>
    <table style='margin:0 auto; border-collapse:collapse; width:70%; height:60%; border:2px solid #333;'>
      <thead><tr>
      <th style='border:2px solid #333; padding:5px;'>Nombre</th>
      <th style='border:2px solid #333; padding:5px;'>Apellido</th>
      <th style='border:2px solid #333; padding:5px;'>DNI</th>
      <th style='border:2px solid #333; padding:5px;'>Carrera</th>
      <th style='border:2px solid #333; padding:5px;'>ID</th>
      </tr></thead><tbody>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
     
      $nombre = $row['Nombre'];
      $apellido = $row['Apellido'];
      $dni = $row['DNI'];
      $carrera = $row['Carrera'];
      $id = $row['id'];

    
  
      echo "
      <tr style='background-color:#f2f2f2;'>
      <td style='border:3px solid #333; padding:10px; width:20%; height:20%;'>$nombre</td>
      <td style='border:3px solid #333; padding:10px; width:20%; height:20%;'>$apellido</td>
      <td style='border:3px solid #333; padding:10px; width:20%; height:20%;'>$dni</td>
      <td style='border:3px solid #333; padding:10px; width:20%; height:20%;'>$carrera</td>
      <td style='border:3px solid #333; padding:10px; width:20%; height:20%;'>$id</td>";
      
  }
    echo"</tr>
    </tbody>
    </table>
    </div</div>";
    
    unset($_SESSION['origen']);
  } else {
    // Redirigir a una página de error o mostrar un mensaje de error
    header('Location: error.php');
    exit();
 } 



?>

<div style='text-align:center; margin-top:20px;'>
  <a href='index.php' class='botonVolver'>Volver</a>
</div>


</html>