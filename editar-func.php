<h1>Editar Funcionário</h1>

<?php
  $sql = "SELECT * FROM codfun WHERE codfun=".$_REQUEST["codfun"];
  $res = $conn->query($sql) or die("erro");
  $row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST">
  <input type="hidden" name="acao" value="editar"><!--Mandando a ação e escondendo a url com o type='hidden' -->
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
    <label>Função</label>
    <input type="text" name="funcao" class="form-control" value="<?php print $row->funcao; ?>" />
  </div>
  <div class="mb-3">
    <label>Salário</label>
    <input type="number" name="salario" class="form-control" value="<?php print $row->salario; ?>"/>
  </div>
  <div class="mb-3">
    <button type="submit" class="btn-primary">Enviar</button>
  </div>
</form>