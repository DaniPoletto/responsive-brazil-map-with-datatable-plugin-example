<?php
//Receber a requisão da pesquisa
$requestData= $_REQUEST;

$unidades = array();

$unidades_sp = array(
    array(
        "São José do Rio Preto",
        "10"
    ),
    array(
        "Mirassol",
        "30"
    )
);

$unidades["SP"] = $unidades_sp;

$unidades_rj = array(
    array(
        "Rio de Janeiro",
        "20"
    )
);

$unidades["RJ"] = $unidades_rj;

$dados = array();
if (isset($unidades[$_POST["estado"]])) {
    $dados = $unidades[$_POST["estado"]];
}

//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
    "draw" => intval($requestData['draw']),//para cada requisição é enviado um número como parâmetro
    "recordsTotal" => 1,  //Quantidade de registros que há no banco de dados
    "recordsFiltered" => 1, //Total de registros quando houver pesquisa
    "data" => $dados,   //Array de dados completo dos dados retornados da tabela
);

echo json_encode($json_data);  //enviar dados como formato json
