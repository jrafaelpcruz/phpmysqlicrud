<h1>Cadastrar Funcionário</h1>

<form action="?page=salvar" method="POST" enctype="multipart/form-data">
  <!-- ectype="multipart/form-data" is used to upload stuff, don't forget to add it -->
  <input type="hidden" name="acao" value="cadastrar"><!--Mandando a ação e escondendo a url com o type='hidden' -->
  <div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control" required/>
  </div>
  <div class="mb-3">
    <label>Departamento</label>
    <input type="text" name="depto" class="form-control"/>
  </div>
  <div class="mb-3">
    <label>Função</label>
    <input type="text" name="funcao" class="form-control"/>
  </div>
  <div class="mb-3">
    <label>Salário</label>
    <input type="number" name="salario" class="form-control"/>
  </div>
  <div class="mb-3">
    <label>Foto</label>
    <input type="file" name="foto" class="form-control"/>
  </div>
  <div class="mb-3">
    <button type="submit" class="btn-primary">Enviar</button>
  </div>
</form>