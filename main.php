<!DOCTYPE HTML>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">

<body>
<?php include('database.php'); ?>
<?php include('heroes.php'); ?>
<?php include('functions.php'); ?>

<div class="well">
<div class="row">
  <div class="col-sm-5" style="background-color:lightgrey;">
    Nombre de usuario: <?php echo $_SESSION['varname']; ?>
  </div>
  <div class="col-sm-5" style="background-color:lightgrey;">
    Puntos chalensher: <?php echo $_SESSION['puntos']; ?>
  </div>
</div>
</div>

<br><br>

<div class="well">
  <div class="row">
    <div class="col-sm-8" style="background-color:lightgrey;">
      <h3 class="modal-title">Mi heroe:<br><br></h3>
      <div class="row">
        <div class="col-sm-4" style="background-color:lightgrey;">
          <img src="<?php echo getHeroe($_SESSION['varname'], $db)->path ?>" style='width:50'>
        </div>
        <div class="col-sm-6" style="background-color:lightgrey;">
          <?php
            getHeroe($_SESSION['varname'], $db)->printStats();
          ?>
    </div>
  </div>
</div>
</div>
</div>

<h2 class="modal-title">Elegir heroe</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  changeHeroe($_POST["heroe"], $db, $_SESSION['varname']);
  Redirect('main.php?', false);
 }
?>

<div class="well">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="image" src=<?php echo $arthas->path ?> width="100">
      <input type="image" src=<?php echo $tyrande->path ?> width="100">
      <input type="image" src=<?php echo $jorge->path ?> width="100">
        <br><br>
      <input type="radio" name="heroe" value="1">Arthas
      <input type="radio" name="heroe" value="2">Tyrande
      <input type="radio" name="heroe" value="3">Jorge
        <br><br>
      <input type="submit" name="submit" value="Submit">
    </form>
</div>

</body>
