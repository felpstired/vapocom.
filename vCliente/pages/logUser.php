<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['cpfLogUser']) && !empty($dados['cpfLogUser'])) {
    $cpf = $dados['cpfLogUser'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['senhaLogUser']) && !empty($dados['senhaLogUser'])) {
    $senha = $dados['senhaLogUser'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

// echo json_encode($cpf . ''. $senha)

$checarCpf = checarLogin('tbusuario', $cpf, $senha);

// echo json_encode($checarCpf);

if ($checarCpf == 'false') {

    echo json_encode('CPF e/ou senha incorretos.');
    die();

} else if ($checarCpf == 'OK') {

    $listarID = listarRegistroU('tbusuario', 'idusuario', 'cpf', $cpf);

    if ($listarID == 'Vazio') {

        echo json_encode('Ocorreu um erro no servidor ao tentar fazer login.');
        die();

    } else {

        foreach ($listarID as $itemId) {

            $_SESSION['idUser'] = $itemId->idusuario;

        }

        echo json_encode('OK');
        die();
    }

} else {

    echo json_encode('Ocorreu um erro no servidor ao tentar fazer login.');
    die();

}

?>