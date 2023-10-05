<?php 

include_once '../config/conexao.php';
include_once '../config/constantes.php';
include_once '../func/functions.php';

// $_POST['nome'] = 'Ana Luísa';
// $_POST['email'] = 'analu@gmail.com';
// $_POST['telefone'] = '(33) 9 9923-6621';
// $_POST['date'] = '2023-07-12';
// $_POST['horario'] = '20:20:00';
// $_POST['pessoas'] = '2';
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

if (isset($_POST['telefone']) && !empty($_POST['telefone'])) {
    $telefone = $_POST['telefone'];
} else {
    echo 'Por favor, preencha os campos necessário antes de continuar.';
    exit();
}

if (isset($_POST['date']) && !empty($_POST['date'])) {
    $date = $_POST['date'];
} else {
    echo 'Por favor, preencha os campos necessário antes de continuar.';
    exit();
}

if (isset($_POST['horario']) && !empty($_POST['horario'])) {
    $horario = $_POST['horario'];
} else {
    echo 'Por favor, preencha os campos necessário antes de continuar.';
    exit();
}

if (isset($_POST['pessoas']) && !empty($_POST['pessoas'])) {
    $pessoas = $_POST['pessoas'];
} else {
    echo 'Por favor, preencha os campos necessário antes de continuar.';
    exit();
}

if (isset($_POST['mensagem'])) {
    $mensagem = $_POST['mensagem'];
} else {
    echo 'Por favor, preencha os campos necessário antes de continuar.';
    exit();
}

$listar = listarRegistrosPar2('email','tbpessoas','A','email',$email);
// var_dump($listar);

if ($listar === false) {
    $idpessoa = inserirRegistrosReturnId('tbpessoas', 'nome, email, telefone, cadastro', "'$nome','$email','$telefone'");
    // var_dump($idpessoa);
    if ($idpessoa === false) {
        echo 'Não foi possível registrar seus dados. ';
        echo 'Tente novamente.';
        exit();
    } else {
        $registrarReserva = inserirRegistros('tbreservas', 'idpessoas, datar, horario, qtddpessoas, comentario, cadastro', "'$idpessoa','$date','$horario','$pessoas','$mensagem'");
        if ($registrarReserva === false) {
            echo 'Não foi possível realizar a reserva. ';
            echo 'Por favor, tente novamente.';
            exit();
        }
    }    
} else {    
    echo 'Já existe uma conta com esse e-mail cadastrado no nosso site. ';
    echo 'Tente novamente com outros dados.';
    exit();
}

echo 'OK';

?>