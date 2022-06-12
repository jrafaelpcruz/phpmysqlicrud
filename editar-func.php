<?php
  print "<h1>Editar Funcionário</h1>";
  $sql = "SELECT * FROM codfun WHERE codfun=".$_REQUEST["codfun"];
  $res = $conn->query($sql) or die("erro");
  $row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST" enctype="multipart/form-data">
  <!--Mandando a ação e escondendo a url com o type='hidden' -->
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="codfun" value="<?php print $row->codfun; ?>">
  <div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control" value="<?php print $row->nome; ?>" required />
  </div>
  <div class="mb-3">
    <label>Departamento</label>
    <input type="text" name="depto" class="form-control" value="<?php print $row->depto; ?>" />
  </div>
  <div class="mb-3">
    <label>Cargo</label>
    <select name="funcao">
      <?php
        //single non repeat option for listing same option originaly held        
        $sql2 = "SELECT * FROM cargos WHERE codC =".$row->codC;
        $res2 = $conn->query($sql2);
        $row2 = $res2->fetch_object();
        print "<option value='$row2->codC'>$row2->cargo</option>";
        //let's do a loop to call options direct from the table cargos. Note the condition on the query WHERE codC !=".$row->cod, that alone solved the duplicate entry bug.
        $sql3 = "SELECT * FROM cargos WHERE codC !=".$row->codC;
        $res3 = $conn->query($sql3);
        while($row3 = $res3->fetch_object()) {          
          print "<option value='{$row3->codC}'>{$row3->cargo}</option>";
        }        
      ?>
    </select>
  </div>
  <div class="mb-3">
    <label>Foto Atual:</label>
    <?php
        print '<img src="data:image/gif;base64,'.$row->foto.'" width="80px"/>';   
      ?>
  </div>
  <div class="mb-3">
    <label>Nova foto?</label>
    <input type="file" name="foto" class="form-control"/>
    <label>Deixe em branco para manter a atual.</label>
  </div>
  <div class="mb-3">
    <button type="submit">Enviar</button>
  </div>
</form>