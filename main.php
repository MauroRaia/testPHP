<!DOCTYPE HTML>
<?php include('database.php'); ?>

<?php
session_start();
?>

Nombre de usuario: <?php echo $_SESSION['varname']; ?>
  <br><br>
Puntos chalensher: <?php echo $_SESSION['puntos']; ?>
  <br><br>
