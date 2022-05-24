<?php
  define('HOST', 'localhost');
  define('USER', 'root');
  define('PASS', 'root');
  define('BASE', 'teste');
$conn = new MysQLi(HOST, USER,PASS,BASE) or die("erro ".mysqli_error);
?>