<?php
include("./inc/settings.php");
validar();

$pdo = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);

if (isset($_POST['identificador']) || isset($_POST['nombre'])||isset($_POST['fecha'])||isset($_POST['numero'])||isset($_POST['numDouble'])) {
  $identificador = $_POST['identificador'];
  $nombre = $_POST['nombre'];
  $fecha = $_POST['fecha'];
  $numero = $_POST['numero'];
  $numdouble = $_POST['numdouble'];
  if ($_POST['action'] == 1) {
    $query = "INSERT INTO table1 (column1, column2, column3, column4, column5) VALUES (:identificador, :nombre, :fecha, :numero, :numdouble);";
  }
  if ($_POST['action'] == 2) {
    $query = "UPDATE table1 SET column2 =  :nombre  , column3 =  :fecha , column4 =  :numero , column5 =  :numdouble  WHERE column1 =  :identificador ;";
  }
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":identificador", $identificador);
  $stmt->bindParam(":nombre", $nombre);
  $stmt->bindParam(":fecha", $fecha);
  $stmt->bindParam(":numero", $numero);
  $stmt->bindParam(":numdouble", $numdouble);
  $stmt->execute();
  header("location:crud.php");
} else {
  echo "Algo salio mal <a href='https://localhost/crud/crud.php'> clic aqui para volver al crud</a>";
}
