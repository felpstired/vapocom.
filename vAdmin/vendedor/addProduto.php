<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['InputCadProduto']) && !empty($dados['InputCadProduto'])) {
   $nomeProd = $dados['InputCadProduto'];
} else {
    echo json_encode('Campos não preenchidos corretamente, por favor tente nvoamente.');
    die();
}

if (isset($dados['InputCadDescricao']) && !empty($dados['InputCadDescricao'])) {
   $descProd = $dados['InputCadDescricao'];
} else {
    echo json_encode('Campos não preenchidos corretamente, por favor tente nvoamente.');
    die();
}

if (isset($dados['InputCadValor']) && !empty($dados['InputCadValor'])) {
    $valorProd = 'R$ '. $dados['InputCadValor'];
} else {
    echo json_encode('Campos não preenchidos corretamente, por favor tente nvoamente.');
    die();
}

$registroCadastrar = insert3Cad('tbproduto', 'produto, descricao, valor, cadastro', $nomeProd, $descProd, $valorProd);

if ($registroCadastrar == 'Gravado') {
    echo json_encode('OK');
    die();
} elseif ($registroCadastrar == 'nGravado') {
    echo json_encode('Não foi possível atualizar os dados.');
    die();
}else {
    echo json_encode('Ocorreu um erro ao realizar a ação.');
    die();
}

?>s