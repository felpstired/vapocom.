<?php 

include_once '../config/conexao.php';
include_once '../config/constantes.php';
include_once '../func/functions.php';

// $_POST['nome'] = 'Ana Luísa';
// $_POST['email'] = 'analu@gmail.com';
// $_POST['assunto'] = 'Opinião simsim';
// $_POST['mensagem'] = 'Nham nham pizza muito bom aiaiai';


if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = $_POST['nome'];
} else {
    echo 'Por favor, preencha os campos necessário antes de continuar.';
    exit();
}

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
} else {
    echo 'Por favor, preencha os campos necessário antes de continuar.';
    exit();
}

if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {
    $assunto = $_POST['assunto'];
} else {
    echo 'Por favor, preencha os campos necessário antes de continuar.';
    exit();
}

if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
    $mensagem = $_POST['mensagem'];
} else {
    echo 'Por favor, preencha os campos necessário antes de continuar.';
    exit();
}

$registrarMensagem = inserirRegistros('tbcontmsg', 'nome, email, assunto, mensagem, cadastro', "'$nome','$email','$assunto','$mensagem'");
if ($registrarMensagem === false) {
    echo 'Não foi possível enviar a sua mensagem. ';
    echo 'Por favor, tente novamente.';
    exit();
}

echo 'OK';

?>