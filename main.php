<!DOCTYPE HTML>
<?php include('database.php'); ?>
<?php include('heroes.php'); ?>

Nombre de usuario: <?php echo $_SESSION['varname']; ?>
  <br><br>
Puntos chalensher: <?php echo $_SESSION['puntos']; ?>
  <br><br>
Mi heroe:
  <br><br>
<?php
getHeroe($_SESSION['varname'], $db)->printStats();
?>

<br><br>
Heroes disponibles:
<br><br>
<input type="image" src=<?php echo $arthas->path ?> alt="Submit" width="100">
<input type="image" src=<?php echo $tyrande->path ?> alt="Submit" width="100">
<input type="image" src=<?php echo $jorge->path ?> alt="Submit" width="100">
