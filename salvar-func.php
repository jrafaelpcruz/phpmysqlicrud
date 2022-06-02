<?php 
  switch (@$_REQUEST["acao"]) {
    case 'cadastrar':
      $nome = $_POST['nome'];
      $depto = $_POST['depto'];
      $funcao = $_POST['funcao'];
      $salario = $_POST['salario'];
      //the super var $_FILES handle uploads, more var's are needed to hold all the file information as:
      $foto = $_FILES['foto'];
      $fotoName = $_FILES['foto']['name'];
      $fotoTmpName = $_FILES['foto']['tmp_name'];
      $fotoSize = $_FILES['foto']['size'];
      $fotoError = $_FILES['foto']['error'];
      $fotoType = $_FILES['foto']['type'];
      //using explode, strtolower and array to define the extension of the image
      $fotoExt = explode('.', $fotoName);
      $fotoActualExt = strtolower(end($fotoExt));
      $allowed = array('jpg', 'jpeg', 'png');//allowed types

      //this will check if the actual extension fit in the array $allowed types
      if (in_array($fotoActualExt, $allowed)) {
        //this will check for upload errors
        if ($fotoError === 0) { 
          //this will check for the file size, remember that it's possible to do the same using a hidden input with MAX_FILE_SIZE on the form
          if ($fotoSize < 1000000) {
            //converting the picture into a evil string
            $image = file_get_contents($fotoTmpName);
            //converting now to a base64 string for storing, be warned it's 33% larger than the actual string
            $image = base64_encode($image);

          } else {
            echo "Arquivo muito grande.";
            break;
          }
        } else {
          echo "Erro com o upload.";
          break;
        }
      } else {
        echo "Não suportado. Use imagens do tipo jpg, jpeg ou png.";
        break;
      }

      $sql = "INSERT INTO codfun (codfun, nome, depto, funcao, salario, foto) VALUES (NULL,'{$nome}','{$depto}','{$funcao}',{$salario},'{$image}');";

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