<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$id = $dados ['id'];
$qtdd = $dados ['qtdd'];

if ($qtdd == 1) {

    $registroExcloi = deleteRegistro('tbcarrinho', 'idcarrinho', $id);

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

} else {

    $novaQ = $qtdd - 1;

    $upCart = updateInt('tbcarrinho', 'qtdd', $novaQ, 'idcarrinho', $id);

    if ($upCart == 'Atualizado') {
        echo json_encode('OK');
        die();
    } else if ($upCart == 'nAtualizado') {
        echo json_encode('Não foi possível apagar produto do carrinho.');
        die();
    } else {
        echo json_encode('Ocorreu um erro no servidor ao apagar os produtos.');
        die();
    }

}




?>