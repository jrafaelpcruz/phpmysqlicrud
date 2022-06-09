<!doctype html>
<html lang="ptbr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <script src="js/bootstrap.bundle.min.js"></script>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">INICIO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="?page=listar">Visualizar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=novo">Cadastrar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=cargos">Cargos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="relatorio.php">Relatórios</a>
          </li>
        </ul>        
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col mt-5"> 
        <?php
          include ("config.php");
          switch(@$_REQUEST["page"]) {
            case "novo":
              include("novo-cadastro.php");
              break;
            case "listar":
              include("listar-func.php");
              break;
            case "salvar":
              include("salvar-func.php");
              break;
            case "editar":
              include("editar-func.php");
              break;
            case "cargos":
              include("gerencia-cargos.php");
              break;
            case "editar-cargo":
              include("editar-cargo.php");
              break;
            case "novo-cargo":
              include("novo-cargo.php");
              break;
            default:
              echo "<h2>Bem vindo(a).</h2>";
            break;
          }
    ?> 
      </div>
    </div>
  </div>
  </body>
</html>