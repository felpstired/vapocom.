<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['tipoPagAlt']) && !empty($dados['tipoPagAlt'])) {
    $tipopag = $dados['tipoPagAlt'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['inputAltTipoPag']) && !empty($dados['inputAltTipoPag'])) {
    $id = $dados['inputAltTipoPag'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

$altRegistro = upUm('tbtipopag', 'tipopag', 'idtipopag', $tipopag, $id);

if ($altRegistro == 'Atualizado') {
    echo json_encode('OK');
    die();
} else if ($altRegistro == 'nAtualizado') {
    echo json_encode('Não foi possível alterar os dados.');
    die();
} else {
    echo json_encode('Ocorreu um erro no servidor ao tentar alterar os dados.');
    die();
}

?>