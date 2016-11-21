<!DOCTYPE HTML>
<?php include('database.php'); ?>
<?php include('functions.php'); ?>
<html>
<head>
</head>
<body>

<?php
// definiendo las variables y dandole valores vacios
$nombre = $contraseña = $email = $liga = $numero = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = test_input($_POST["nombre"]);
  $contraseña = test_input($_POST["contraseña"]);
  $email = test_input($_POST["email"]);
  $liga = test_input($_POST["liga"]);
  $numero = test_input($_POST["numero"]);
  $data = array($nombre, $contraseña, $email, $liga, $numero);
  insertUser($data, $db);
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Nombre de usuario: <input type="text" name="nombre">
  <br><br>
  Contraseña: <input type="password" name="contraseña">
  <br><br>
  Email: <input type="text" name="email">
  <br><br>
  Sos bronce?
  <input type="radio" name="liga" value="1">Si
  <input type="radio" name="liga" value="0">No
  <br><br>
  Puntos chalensher: <input type="number" name="numero">
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
