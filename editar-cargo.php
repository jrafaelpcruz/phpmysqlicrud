<?php
  print "<h1>Editar Cargo</h1>";
  $sql = "SELECT * FROM cargos WHERE codC=".$_REQUEST["codC"];
  $res = $conn->query($sql) or die("erro");
  $row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST">
  <!--Mandando a ação e escondendo a url com o type='hidden' -->
  <input type="hidden" name="acao" value="editar-cargo">
  <input type="hidden" name="codC" value="<?php print $row->codC; ?>">
  <div class="mb-3">
    <label>Cargo</label>
    <input type="text" name="cargo" class="form-control" value="<?php print $row->cargo; ?>" required />
  </div>
  <div class="mb-3">
    <label>Salário</label>
    <input type="text" name="salario" class="form-control" value="<?php print $row->salario; ?>" />
  </div>
  <div class="mb-3">
    <button type="submit" class="btn-primary">Enviar</button>
  </div>
</form>