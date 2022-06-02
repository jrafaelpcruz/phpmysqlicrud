<h1>Funcionários</h1>
<?php
  $sql = "SELECT * FROM codfun";
  $res = $conn->query($sql) or die("erro");
  $qtd = $res->num_rows;

  if($qtd > 0) {
    print "<table class='table table-hover table-bordered'>";
    print "<tr>";
      print "<th>"."#"."</th>";
      print "<th>"."Nome"."</th>";
      print "<th>"."Departamento"."</th>";
      print "<th>"."Função"."</th>";
      print "<th>"."Salário"."</th>";
      print "<th>"."Ações"."</th>";
    print "</tr>";
    while($row = $res->fetch_object()) {
      print "<tr>";
        print "<td>".$row->codfun."</td>";
        print "<td>".$row->nome."</td>";
        print "<td>".$row->depto."</td>";
        print "<td>".$row->funcao."</td>";
        print "<td>".$row->salario."</td>";
        print "<td>
                <button onclick=\"location.href='?page=editar&codfun=".$row->codfun."';\" class='btn btn-success'>Editar</button>
                
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&codfun=".$row->codfun."';}else{false;}\" class='btn btn-danger'>Excluir</button>
               </td>";
                //if-else com JS no botao onclick Excluir
      print "</tr>";
    }
    print "</table>";
    print "<div><a href='relatorio.php'>Gerar Relatório:</a></div>";
  } else {
    print "<h2>Vazio, não é o que você esperava né?</h2>";
  }
?>