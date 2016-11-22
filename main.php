<!DOCTYPE HTML>

<style>
div {
    background-color: lightgrey;
    width: 310px;
    border: 25px solid green;
    padding: 25px;
    margin: 25px;
}
</style>

<?php include('database.php'); ?>
<?php include('heroes.php'); ?>
<?php include('functions.php'); ?>

Nombre de usuario: <?php echo $_SESSION['varname']; ?>
  <br><br>
Puntos chalensher: <?php echo $_SESSION['puntos']; ?>
  <br><br>
Mi heroe:
  <br><br>

<img src="<?php echo getHeroe($_SESSION['varname'], $db)->path ?>" alt="Mountain View" style="width:50">
<br><br>
<?php
getHeroe($_SESSION['varname'], $db)->printStats();
?>

<br><br>
<div>
Elegir heroe:
<br><br>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  changeHeroe($_POST["heroe"], $db, $_SESSION['varname']);
  Redirect('main.php?', false);
 }

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<input type="image" src=<?php echo $arthas->path ?> width="100">
<input type="image" src=<?php echo $tyrande->path ?> width="100">
<input type="image" src=<?php echo $jorge->path ?> width="100">

<input type="radio" name="heroe" value="1">Arthas
<input type="radio" name="heroe" value="2">Tyrande
<input type="radio" name="heroe" value="3">Jorge
<br><br>
<input type="submit" name="submit" value="Submit">

</form>
</div>
