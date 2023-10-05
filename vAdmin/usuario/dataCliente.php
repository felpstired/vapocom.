<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$id = $dados['id'];

$listar = listarRegistroUAssoc('tbusuario', 'nome, senha, cpf, email', 'idusuario', $id);

if ($listar != 'Vazio') {
    $listarStr = is_string($listar);
    if ($listarStr == 1 OR $listarStr) {
        echo json_encode(['status' => false, 'dadosArray' => 'ERRO']);
        die();
    } else {
        echo json_encode(['status' => 'OK', 'dadosArray' => $listar]);
        die();
    }
} else {
    echo json_encode(['status' => false, 'dadosArray' => 'ERRO']);
    die();
}

?>