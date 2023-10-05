<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$id = $dados['id'];


if ($dados['valor'] == 'ativar') {
    $valor = 'A';
} elseif ($dados['valor'] == 'desativar') {
    $valor = 'D';
}else {
    echo json_encode('Ocorreu um erro ao realizar a ação.');
    die();
}


$registroAtivar = upUm('tbproduto', 'ativo', 'idproduto', $valor, $id);

if ($registroAtivar == 'Atualizado') {
    echo json_encode('OK');
    die();
} elseif ($registroAtivar == 'nAtualizado') {
    echo json_encode('Não foi possível atualizar os dados.');
    die();
}else {
    echo json_encode('Ocorreu um erro ao realizar a ação.');
    die();
}

?>