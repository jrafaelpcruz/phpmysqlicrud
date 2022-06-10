<?php
//Optei por utilizar o package Dompdf 1.2.2 para fazer o exercicio proposto, então o mesmo foi instalado na raiz do site do CRUD e está sendo chamado aqui
//criando a conexão com o banco de dados
include_once ("config.php");
//inluindo o autoloader do composer para o dompdf
require 'vendor/autoload.php';
//criando a variavel html para evitar alguns erros de renderizaçao
$html='';
$qtdfinal = 0;
//informando o uso do dompdf
use Dompdf\Dompdf;
//montando o banco a ser visualizado e renderizado em pdf
//requisiçao no mysql
$sql = "SELECT codC, count(codC) as 'quantidade' from codfun GROUP BY codC;";
//resultado com a requisicao e a conexão
$res = $conn->query($sql) or die("erro");
//vamos concatenar uma tag estilo e titulo para uso:
$html.="
  <style>
    table {
      width: 75%;
      margin-right: auto;
      margin-left: auto;
    }
    th {
      font-size:20px;
      text-align:left;
    }
    td {
      font-size:22px;
      padding-left:10px;
      border:1px solid lightgrey;
    }
    h1 {
      margin:20px;
      text-align:center;
      font-size:50px;
      border-top:2px solid lightgrey;
      border-bottom:2px solid lightgrey;
    }
  </style>
";
//cada linha é concatenada na variavel $html para uso no Dompdf
//Indice do banco:
$html .= "<table>";
$html .= "<tr>";
$html .=  "<th>Função</th>";
$html .=  "<th>N Profissionais</th>";
$html .=  "<th>Gasto Total</th>";

$html .=  "</tr>";
//loop responsavel pelos dados no banco
while($row = $res->fetch_object()) {
  $html .=  "<tr>";
  $sql2 = "SELECT cargo FROM cargos WHERE codC=$row->codC";
  $res2 = $conn->query($sql2) or die("erro");
  $row2 = $res2->fetch_object();
  $html .= "<td>".$row2->cargo."</td>";

  $html .= "<td>".$row->quantidade."</td>";

  $sql3 = "SELECT salario FROM cargos WHERE codC=$row->codC";
  $res3 = $conn->query($sql3) or die("erro");
  $row3 = $res3->fetch_object();
  $html .= "<td>R$ ".$row->quantidade * $row3->salario."</td>";
  $qtdfinal = $qtdfinal + ($row->quantidade * $row3->salario);
  $html .=  "</tr>";
  }
$html .=  "<tr><td colspan='2'><b>Total:</b></td>
               <td><b>R$ {$qtdfinal}</b></td>
          </tr>";
  //fechando a tabela
$html .=  "</table>";

//intanciando a classe Dompdf para uso
$dompdf = new Dompdf();
//carregando $html para ser renderizado em pdf
$dompdf->loadHtml("<h1>Relatório de Custos:</h1>" . $html);
//setando o papel para A4 e 'retrato'
$dompdf->setPaper('A4', 'portrait');
//renderizando
$dompdf->render();
//'jogando' o pdf para o navegador
$dompdf->stream();
?>

