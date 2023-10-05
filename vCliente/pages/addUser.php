<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['nomeUser']) && !empty($dados['nomeUser'])) {
    $nome = $dados['nomeUser'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['emailUser']) && !empty($dados['emailUser'])) {
    $email = $dados['emailUser'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['cpfUser']) && !empty($dados['cpfUser'])) {
    $cpf = $dados['cpfUser'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['senhaUser']) && !empty($dados['senhaUser'])) {
    $senha = $dados['senhaUser'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

$inserir = insertQuatro('tbusuario', 'nome, senha, cpf, email', $nome, $senha, $cpf, $email);

if ($inserir == 'Gravado') {
    echo json_encode('OK');
    $_SESSION['cpf'] = $cpf;
    die();
} else if ($inserir == 'nGravado') {
    echo json_encode('Não foi possível cadastrar os dados.');
    die();
} else {
    echo json_encode('Ocorreu um erro no servidor ao tentar cadastrar os dados.');
    die();
}

?>