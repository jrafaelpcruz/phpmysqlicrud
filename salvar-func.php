<?php 
  switch (@$_REQUEST["acao"]) {
    case 'cadastrar':
      $nome = $_POST['nome'];
      $depto = $_POST['depto'];
      $funcao = $_POST['funcao'];
      $salario = $_POST['salario'];

      $sql = "INSERT INTO codfun (codfun, nome, depto, funcao, salario) VALUES (NULL,'{$nome}','{$depto}','{$funcao}',{$salario});";

      $res = $conn->query($sql) or die("erro");
      echo "<br><h2>Incluido com sucesso.</h2>";
      break;
    case 'editar':
      $nome = $_POST['nome'];
      $depto = $_POST['depto'];
      $funcao = $_POST['funcao'];
      $salario = $_POST['salario'];

      $sql = "UPDATE codfun SET
                nome='{$nome}',
                depto='{$depto}',
                funcao='{$funcao}',
                salario={$salario}
              WHERE
                codfun=".$_REQUEST['codfun'];
      $res = $conn->query($sql);
      echo "<br><h2>Editado com sucesso.</h2>";
      break;
    case 'excluir':
      $sql = "DELETE FROM codfun WHERE codfun=".$_REQUEST["codfun"];
      $res = $conn->query($sql) or die("erro");
      echo "<br><h2>Excluido.</h2>";
      break;
  }
?>