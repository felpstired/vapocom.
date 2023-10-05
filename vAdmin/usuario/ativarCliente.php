<?php 

// echo json_encode('AAAAAAAAAAA');

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$id = $dados['id'];

$listar = listarRegistroU('tbusuario', 'ativo', 'idusuario', $id);

if ($listar == 'Vazio'){
    echo json_encode('Não foi possível encontrar o registro correspondente.');
    die();
}

foreach ($listar as $itemLista) {
    $ativo = $itemLista->ativo;
}

if ($ativo == 'A') {
    $valor = 'D';
} else if ($ativo == 'D') {
    $valor = 'A';
} else {
    echo json_encode('Ocorreu um erro ao tentar determinar o status do registro.');
    die();
}

// if ($dados['valor'] == 'ativar') {
//     $valor = 'A';
// } elseif ($dados['valor'] == 'desativar') {
//     $valor = 'D';
// } else {
//     echo json_encode('Ocorreu um erro ao definir o status do registro.');
//     die();
// }

$update = upUm('tbusuario', 'ativo', 'idusuario', $valor, $id);

if ($update == 'Atualizado') {
    echo json_encode('OK');
    die();
} elseif ($update == 'nAtualizado') {
    echo json_encode('Não foi possível atualizar os dados.');
    die();
} else {
    echo json_encode('Ocorreu um erro no servidor ao tentar atualizar os dados.');
    die();
}

?>