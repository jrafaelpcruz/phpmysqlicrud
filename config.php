<?php
  //show me the errors please
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  //let's connect
  define('HOST', 'localhost');
  define('USER', 'root');
  define('PASS', 'root');
  $checkdatabases = new MysQLi(HOST,USER,PASS);

  $sqldatabase = "SHOW DATABASES LIKE 'teste';";
  $resdatabase = $checkdatabases->query($sqldatabase) or die("erro");
  $qtddatabase = $resdatabase->num_rows;

  if($qtddatabase != 0) {    
    define('BASE', 'teste');
    $conn = new MysQLi(HOST,USER,PASS,BASE);
  } else {
    print "<h1 style='color:red;'>!!!ERRO FATAL!!!</h1>";
    print "<h2>Esse sistema NÃO funciona sem a base de dados teste:</h2>";
    include 'tabelas.php';
    die;
  }
  
?>