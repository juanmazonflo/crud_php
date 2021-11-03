<?php
include("./inc/settings.php");

$pdo = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);

if (isset($_POST['username']) && isset($_POST['pwd'])) {
  $username = $_POST['username'];
  $password = $_POST['pwd'];
  $query = "SELECT * FROM usuarios WHERE numero_de_empleado = :username AND pass= md5(:password)";

  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":password", $password);
  $stmt->execute();
}

if ($stmt->rowCount() == 1 ) {

  // output data of each row
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  session_start();
  $_SESSION["nombre"] = $row["nombre"];
  $_SESSION["apellido1"] = $row["apellido1"];
  $_SESSION["apellido2"] = $row["apellido2"];

  header("location: crud.php");
} else {
  echo "Se detecto un acceso ilegal al sistema, su ip esta siendo monitoreada y sera enviada a la policia";
?>
  <a href="http://localhost/crud/">Sitio de login</a>
<?php
}
$conn->close();

?>