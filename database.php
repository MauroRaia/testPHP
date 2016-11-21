<?php
  class MyDB extends SQLite3
  {
    function __construct()
    {
        $this->open('prueba.db');
      }
    }

    function insertUser($data){
      $db = new MyDB();

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
    function logIn($data){
      $db = new MyDB();
      $query = "SELECT CONTRASEÑA FROM USUARIOS WHERE NOMBRE = '$data[0]'";
      $result = $db->querySingle($query);
      return $result==$data[1];

      $db->close();
    }
    function getPoints($data){
      $db = new MyDB();
      $query = "SELECT NUMERO FROM USUARIOS WHERE NOMBRE = '$data[0]'";
      $result = $db->querySingle($query);
      return $result;

    }
?>
