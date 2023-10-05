<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$idArte = $dados['id'];

// echo json_encode($idArte);

$listarCarrinho = listarRegistrosDoisInt('idcarrinho, qtdd', 'tbcarrinho', 'idusuario', $_SESSION['idUser'], 'idartesvend', $idArte);

if (!$listarCarrinho) {

    $insert = insertDoisNum('tbcarrinho', 'idusuario, idartesvend, cadastro', $_SESSION['idUser'], $idArte);

// echo json_encode($insert);

    if ($insert == 'Gravado') {
        echo json_encode('OK');
        die();
    } else if ($insert == 'nGravado') {
        echo json_encode('Não foi possível adicionar produto ao carrinho.');
        die();
    } else {
        echo json_encode('Ocorreu um erro no servidor ao adicionar os produtos.');
        die();
    }
} else {
    foreach ($listarCarrinho as $qtddCart) {
        $idcart = $qtddCart->idcarrinho;
        $qtdd = $qtddCart->qtdd;
    }

    $novaQ = $qtdd + 1;

    $upCart = updateInt('tbcarrinho', 'qtdd', $novaQ, 'idcarrinho', $idcart);

    if ($upCart == 'Atualizado') {
        echo json_encode('OK');
        die();
    } else if ($upCart == 'nAtualizado') {
        echo json_encode('Não foi possível adicionar produto ao carrinho.');
        die();
    } else {
        echo json_encode('Ocorreu um erro no servidor ao adicionar os produtos.');
        die();
    }

}


?>