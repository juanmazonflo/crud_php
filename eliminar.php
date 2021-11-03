<?php
include("./inc/settings.php");
validar();

$pdo = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);

if (isset($_POST['colum1'])) {
  $id=$_POST['colum1'];
  $query = "DELETE FROM table1 WHERE column1=:id;";

  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":id", $id);
  $stmt->execute();
  header("location:crud.php");
}else{
  echo "Algo salio mal <a href='https://localhost/crud/crud.php'> clic aqui para volver al crud</a>" ;

}

?>