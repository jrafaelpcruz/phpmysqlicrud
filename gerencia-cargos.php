<?php
  $sql = "SELECT * FROM cargos;";
  $res = $conn->query($sql) or die("erro");
  $qtd = $res->num_rows;
  print "<h1>Cargos</h1>";

  if($qtd > 0) {
    print "<table class='table table-hover table-bordered'>";
    print "<tr>";
      print "<th>#</th>";
      print "<th>Cargo</th>";
      print "<th>Salário</th>";
      print "<th>Ação</th>";
    print "</tr>";
    while($row = $res->fetch_object()) {
      print "<tr>";
        print "<td>".$row->codC."</td>";
        print "<td>".$row->cargo."</td>";
        print "<td>R$ ".$row->salario."</td>";
        print "<td>
                <button onclick=\"location.href='?page=editar-cargo&codC=".$row->codC."';\" class='btn btn-success'>Editar</button>
              </td>";
      print "</tr>";
    }
    print "</table>"; 
  }
  
  print "<button onclick=\"location.href='?page=novo-cargo'\">Novo Cargo</button>";
?>