<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['nomeUsuario']) && !empty($dados['nomeUsuario'])) {
    $nome = $dados['nomeUsuario'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['emailUsuario']) && !empty($dados['emailUsuario'])) {
    $email = $dados['emailUsuario'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['cpfUsuario']) && !empty($dados['cpfUsuario'])) {
    $cpf = $dados['cpfUsuario'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['senhaUsuario']) && !empty($dados['senhaUsuario'])) {
    $senha = $dados['senhaUsuario'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

$inserir = insertQuatro('tbusuario', 'nome, email, cpf, senha', $nome, $email, $cpf, $senha);

if ($inserir == 'Gravado') {
    echo json_encode('OK');
    die();
} else if ($inserir == 'nGravado') {
    echo json_encode('Não foi possível cadastrar os dados.');
    die();
} else {
    echo json_encode('Ocorreu um erro no servidor ao tentar cadastrar os dados.');
    die();
}

?>