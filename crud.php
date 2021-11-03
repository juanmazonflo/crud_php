<?php
include("./inc/settings.php");
validar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/funciones.js"></script> 

<link rel="stylesheet" href="./css/estilos.css">

</head>
<body>
    Bienvenido a mi crud
    <?= $_SESSION["nombre"]?>
    <?= $_SESSION["apellido1"]?>
    <?= $_SESSION["apellido2"]?>
    <a href="logout.php" >Log out</a>
<?php
// Create connection
$pdo = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);


$sql = "SELECT column1, column2, column3, column4, column5 FROM table1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
define("TD", "</td>\n\t<td>");

if ($stmt->rowCount() > 0) {
  echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Fecha</th><th>Numero</th><th>NumeroDouble</th><th>Eliminar</th><th>Modificar</th></tr>";
  // output data of each row
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "\n<tr>\n\t<td>".$row["column1"].TD.$row["column2"].TD.$row["column3"].TD.$row["column4"].TD.$row["column5"]."</td>";
    echo "<td>";
    echo "<form action='eliminar.php' method='post'>";
    echo "<input type='hidden' name='colum1' value='".$row["column1"]."'>";
    echo "<input type='submit' value='' style=\"background:url('./img/eliminar.png'); border: 0; display: block; width: 24px; height: 24px;\" onclick='return confirmar()'></form></td>\n";
    echo "<td>";
    
    echo "<form action='update.php' method='post'>";
    echo "<input type='hidden' name='colum1' value='".$row["column1"]."'>";
    echo "<input type='submit' value='' style=\"background:url('./img/update.png'); border: 0; display: block; width: 24px; height: 24px;\" onclick='return confirmar()'></form></td>\n";
    echo "<td>";
          //=======================================================
          //�ltima modificaci�n realizada el 2021-09-15
          //Por El�as L�pez Garc�a
          //Por hacer: modificar archivo update.php
          //=======================================================
  }
  echo "</table>";
} else {
  echo "0 results";
}
?>
<br>
<form action="insertar.php" method="post">

<fieldset style="width:300px">
<legend>Inserte la informacion del nuevo registro</legend>
  Id: <input type="number" name="identificador" id="" value="1975" class="w3-input" required><br>
  Nombre: <input type="text" name="nombre" id="" value="Humberto" class="w3-input"><br>
  Fecha: <input type="date" name="fecha" id="" value="1975-06-23"><br>
  Numero: <input type="number" name="numero" id="" value=""><br> 
  Num.Double: <input type="number" name="numdouble" id="" value=""><br>
  <input type="hidden" name="action" value="1">
  <br>
  <input type="submit" value="Aceptar"><br> 
</fieldset>
</form>

</body>

</body>
</html>