<?php
include("./inc/settings.php");
validar();
?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);

if (isset($_POST['colum1'])) {
  $colum1 = $_POST['colum1'];
  $query = "SELECT column1, column2, column3, column4, column5 FROM table1 WHERE column1 =  :colum1  ;";

  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":colum1", $colum1);
  $stmt->execute();
} else {
  echo "Algo salio mal <a href='https://localhost/crud/crud.php'> clic aqui para volver al crud</a>";
}



if ($stmt->rowCount() > 0) {
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
  <form action="insertar.php" method="POST">
    <fieldset>
      <legend>Cambie la información del registro.</legend>
      Id: <input type="number" name="identificador" id="" value="<?= $row['column1'] ?>" readonly><br>
      Nombre: <input type="text" name="nombre" id="" value="<?= $row['column2'] ?>"><br>
      Fecha: <input type="date" name="fecha" id="" value="<?= $row['column3'] ?>"><br>
      Numero: <input type="number" name="numero" id="" value="<?= $row['column4'] ?>"><br>
      Num.Double: <input type="double" name="numdouble" id="" value="<?= $row['column5'] ?>"><br>
      <input type="hidden" name="action" value="2">
      <br>
      <input type="submit" value="Modificar"><br>
    </fieldset>
  </form>
<?php
}



?>