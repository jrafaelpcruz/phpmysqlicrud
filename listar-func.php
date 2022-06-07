<h1>Funcionários</h1>
<?php
  $sql = "SELECT * FROM codfun";
  $res = $conn->query($sql) or die("erro");
  $qtd = $res->num_rows;

  if($qtd > 0) {
    print "<table class='table table-hover table-bordered'>";
    print "<tr>";
      print "<th>#</th>";
      print "<th>Nome</th>";
      print "<th>Departamento</th>";
      print "<th>Função</th>";
      print "<th>Salário</th>";
      print "<th>Foto</th>";
      print "<th>Ações</th>";
    print "</tr>";
    while($row = $res->fetch_object()) {
      print "<tr>";
        print "<td>".$row->codfun."</td>";
        print "<td>".$row->nome."</td>";
        print "<td>".$row->depto."</td>";
        print "<td>";
          $sql2 = "SELECT cargo FROM cargos WHERE codC=$row->codC";
          $res2 = $conn->query($sql2) or die("erro");
          $row2 = $res2->fetch_object();
          print $row2->cargo;
        print "</td>";
        print "<td>";
          $sql2 = "SELECT salario FROM cargos WHERE codC=$row->codC";
          $res2 = $conn->query($sql2) or die("erro");
          $row2 = $res2->fetch_object();
          print "R$ ".$row2->salario;
        print "</td>";
        /*pulling the image from database for visualization and decoding the base64 string
        some argue it's best to serve the file from the server instead of the database for less overhead on the server. But also say having the image on the database is best for keeping it organized*/
        print '<td><img src="data:image/gif;base64,' . $row->foto . '" width="80px"/></td>';
        //if-else com JS no botao onclick Excluir
        print "<td>
                <button onclick=\"location.href='?page=editar&codfun=".$row->codfun."';\" class='btn btn-success'>Editar</button>
                
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&codfun=".$row->codfun."';}else{false;}\" class='btn btn-danger'>Excluir</button>
               </td>";
      print "</tr>";
    }
    print "</table>";
    print "<div><a href='relatorio.php'>Gerar Relatório</a></div>";
  } else {
    print "<h2>Vazio, não é o que você esperava né?</h2>";
  }
?>