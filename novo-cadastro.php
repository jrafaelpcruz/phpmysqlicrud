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
    <label>Cargo</label>
    <select name="funcao">
      <?php
        //let's do a loop to call options direct from the table cargos
        //making the connection and selecting stuff from cargos
        include "config.php";
        $sql = "SELECT * FROM cargos";
        $res = $conn->query($sql) or die("erro");
        while($row = $res->fetch_object()) {          
          print "<option value='{$row->codC}'>{$row->cargo}</option>";
          
        }        
      ?>
    </select>
  </div>
  <div class="mb-3">
    <label>Foto</label>
    <input type="file" name="foto" class="form-control"/>
  </div>
  <div class="mb-3">
    <button type="submit" class="btn-primary">Enviar</button>
  </div>
</form>