<!DOCTYPE HTML>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">

<?php include('database.php'); ?>
<?php include('functions.php'); ?>
<html>
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
<div class="well">
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
</div>
</body>
</html>
