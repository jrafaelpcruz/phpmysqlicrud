<?php
//Optei por utilizar o package Dompdf 1.2.2 para fazer o exercicio proposto, então o mesmo foi instalado na raiz do site do CRUD e está sendo chamado aqui
//criando a conexão com o banco de dados
include_once ("config.php");
//inluindo o autoloader do composer para o dompdf
require 'vendor/autoload.php';
//informando o uso do dompdf
use Dompdf\Dompdf;
//criando a variavel $html que irá conter o banco
$html='';
//montando o banco a ser visualizado e renderizado em pdf
//requisiçao no mysql
$sql = "SELECT * FROM codfun";
//resultado com a requisicao e a conexão
$res = $conn->query($sql) or die("erro");
//cada linha é concatenada na variavel $html para uso no Dompdf
//Indice do banco:
    $html .= "<table border='1'>";
    $html .= "<tr>";
    $html .= "<th>"."#"."</th>";
    $html .=  "<th>"."Nome"."</th>";
    $html .=  "<th>"."Departamento"."</th>";
    $html .=  "<th>"."Função"."</th>";
    $html .=  "<th>"."Salário"."</th>";
    $html .=  "</tr>";
    //loop responsavel pelos dados no banco
    while($row = $res->fetch_object()) {
      $html .=  "<tr>";
      $html .=  "<td>".$row->codfun."</td>";
      $html .=  "<td>".$row->nome."</td>";
      $html .=  "<td>".$row->depto."</td>";
      $html .=  "<td>".$row->funcao."</td>";
      $html .=  "<td>".$row->salario."</td>";
      $html .=  "</tr>";
    }
    //fechando a tabela
    $html .=  "</table>";
    //intanciando a classe Dompdf para uso
    $dompdf = new Dompdf();
    //carregando $html para ser renderizado em pdf
    $dompdf->loadHtml("<h1>Relatório de Funcionários:</h1>" . $html);
    //setando o papel para A4 e 'retrato'
    $dompdf->setPaper('A4', 'portrait');
    //renderizando
    $dompdf->render();
    //'jogando' o pdf para o navegador
    $dompdf->stream();
?>