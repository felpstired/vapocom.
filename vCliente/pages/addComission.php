<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados['prodEsc']) && !empty($dados['prodEsc'])) {
    if (isset($dados['prodEsc']) == 0) {
        $prodEsc = 'Cabeça';
        $valor = 35.00;
    }
    if (isset($dados['prodEsc']) == 1) {
        $prodEsc = 'Busto';
        $valor = 50.00;
    }
    if (isset($dados['prodEsc']) == 2) {
        $prodEsc = 'Corpo';
        $valor = 76.00;
    }
    if (isset($dados['prodEsc']) == 3) {
        $prodEsc = 'Cenário';
        $valor = 85.00;
    }
    if (isset($dados['prodEsc']) == 4) {
        $prodEsc = 'Cenário + Corpo';
        $valor = 156.00;
    }
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['tipopag']) && !empty($dados['tipopag'])) {
    $tipopag = $dados['tipopag'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['desc']) && !empty($dados['desc'])) {
    $desc = $dados['desc'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if (isset($dados['idVend']) && !empty($dados['idVend'])) {
    $idVend = $dados['idVend'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

$idPag = inserirRegistrosReturnId('tbpagamento', 'idtipopag, valor', "$tipopag, $valor");

if (!$idPag) {
    echo json_encode('Ocorreu um erro no servidor ao tentar definir o pagamento.');
    die();
}

$listar = listarRegistroU('tbusuario', 'idusuario', 'cpf', $_SESSION['cpf']);

foreach ($listar as $listarItem) {
    $id = $listarItem->idusuario;
}

$inserir = inserirRegistros('tbpedidos', 'idusuario, idvendedor, idpagamento, prodEsc, descricao', "$id, $idVend, $idPag, $prodEsc, $desc");

if ($inserir) {
    echo json_encode('OK');
    die();
} else if (!$inserir) {
    echo json_encode('Não foi possível fazer cadastro do pedido.');
    die();
} else {
    echo json_encode('Ocorreu um erro no servidor ao tentar cadastrar os dados.');
    die();
}

?>