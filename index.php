<!DOCTYPE HTML>
<?php include('database.php'); ?>
<?php include('functions.php'); ?>
<html lang="en">
<head>
  <title>Vladi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = test_input($_POST["nombre"]);
  $contraseña = test_input($_POST["contraseña"]);
  $data = array($nombre, $contraseña);
  if (logIn($data, $db)){
    $userName = $nombre;
    $_SESSION['varname'] = $userName;
    $_SESSION['puntos'] = getPoints($data, $db);
    Redirect('main.php?', false);
  }
  else{
    echo "<script type='text/javascript'>alert('Forro');</script>";
  }

}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Nombre de usuario: <input type="text" name="nombre">
  <br><br>
  Contraseña: <input type="password" name="contraseña">
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>
</body>
