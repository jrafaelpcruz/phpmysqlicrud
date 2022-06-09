<h1>Novo Cargo</h1>

<form action="?page=salvar" method="POST">
  <!-- ectype="multipart/form-data" is used to upload stuff, don't forget to add it -->
  <input type="hidden" name="acao" value="salvar-cargo"><!--Mandando a ação e escondendo a url com o type='hidden' -->
  <div class="mb-3">
    <label>Cargo</label>
    <input type="text" name="cargo" class="form-control" required/>
  </div>
  <div class="mb-3">
    <label>Salário</label>
    <input type="text" name="salario" class="form-control" required/>
  </div>
  <div class="mb-3">
    <button type="submit" class="btn-primary">Enviar</button>
  </div>
</form>