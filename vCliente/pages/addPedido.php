<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$valor = $_SESSION['$totalValor'];

if (isset($dados['tipoPag']) && !empty($dados['tipoPag'])) {
    $tipopag = $dados['tipoPag'];
} else {
    echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
    die();
}

if ($tipopag == '2' OR $tipopag == '3') {

    if (isset($dados['numCard']) && !empty($dados['numCard'])) {
        $numCard = $dados['numCard'];
    } else {
        echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
        die();
    }

    if (isset($dados['numCardT']) && !empty($dados['numCardT'])) {
        $numCardT = $dados['numCardT'];
    } else {
        echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
        die();
    }

    if (isset($dados['vencimento']) && !empty($dados['vencimento'])) {
        $vencimento = $dados['vencimento'];
    } else {
        echo json_encode('Campos não preenchidos ou inexistentes. Por favor, tente novamente.');
        die();
    }

    $idPag = inserirRegistrosReturnId('tbpagamento', 'idtipopag, valor, numCard, numCardT, vencimento', "$tipopag, $valor, $numCard, $numCardT, $vencimento");

    if (!$idPag) {
        echo json_encode('Ocorreu um erro no servidor ao tentar definir o pagamento.');
        die();
    }

} else {

    $idPag = inserirRegistrosReturnId('tbpagamento', 'idtipopag, valor', "$tipopag, $valor");

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