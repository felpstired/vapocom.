<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['nomeUsuarioAlt']) && !empty($dados['nomeUsuarioAlt'])) {
    $nome = $dados['nomeUsuarioAlt'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['emailUsuarioAlt']) && !empty($dados['emailUsuarioAlt'])) {
    $email = $dados['emailUsuarioAlt'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['cpfUsuarioAlt']) && !empty($dados['cpfUsuarioAlt'])) {
    $cpf = $dados['cpfUsuarioAlt'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['senhaUsuarioAlt']) && !empty($dados['senhaUsuarioAlt'])) {
    $senha = $dados['senhaUsuarioAlt'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['inputAltCliente']) && !empty($dados['inputAltCliente'])) {
    $id = $dados['inputAltCliente'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

$altRegistro = upQuatro('tbusuario', 'nome', 'email', 'cpf', 'senha', 'idusuario', $nome, $email, $cpf, $senha, $id);

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