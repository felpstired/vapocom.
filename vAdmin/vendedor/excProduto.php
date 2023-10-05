<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$id = $dados ['id'];

$registroExcloi = deleteRegistro('tbproduto', 'idproduto', $id);


if ($registroExcloi == 'Deletado') {
    echo json_encode('OK');
    die();
} elseif ($registroExcloi == 'nDeletado') {
    echo json_encode('Não foi possível atualizar os dados.');
    die();
}else {
    echo json_encode('Ocorreu um erro ao realizar a ação.');
    die();
}

?>