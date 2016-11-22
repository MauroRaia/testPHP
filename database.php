<?php
  class MyDB extends SQLite3
  {

    function __construct()
    {
        $this->open('prueba.db');
      }
    }

    function insertUser($data, $db){

      $sql =<<<EOF
      INSERT INTO USUARIOS (NOMBRE, CONTRASEÑA, EMAIL, BRONCE, NUMERO)
      VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]');
EOF;

      $ret = $db->exec($sql);
        if(!$ret){
          echo $db->lastErrorMsg();
        } else {
          echo "<script type='text/javascript'>alert('Usuario registrado');</script>";
        }
        $db->close();
    }
    function logIn($data, $db){
      $query = "SELECT CONTRASEÑA FROM USUARIOS WHERE NOMBRE = '$data[0]'";
      $result = $db->querySingle($query);
      return $result==$data[1];

      $db->close();
    }
    function getPoints($data, $db){
      $query = "SELECT NUMERO FROM USUARIOS WHERE NOMBRE = '$data[0]'";
      $result = $db->querySingle($query);
      return $result;
      $db->close();

    }
    function getHeroe($data, $db){
      $query = "SELECT ID_HEROE FROM USUARIOS WHERE NOMBRE = '$data'";
      $result = $db->querySingle($query);

      foreach (Heroe::$instances as $obj){
        if ($obj->id == $result){
          return $obj;
          $db->close();
        }
      }
    }
    function changeHeroe($data, $db, $nombre){
      $query = "UPDATE USUARIOS SET ID_HEROE = '$data' WHERE NOMBRE = '$nombre'";
      $result = $db->querySingle($query);
      $db->close();

    }
$db = new MyDB();
?>
