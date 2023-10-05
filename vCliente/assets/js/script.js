$(document).ready(function () {

    // fazer as mascars funcionarem
    masks();


    // navegação na página
    $('.linkMenu').click(function (event) {
        event.preventDefault();

        document.getElementById("homeSidebar").style.width = "0"

        let menuClicado = $(this).attr('idMenu');

        let dados = {
            acao: menuClicado,
        };

        $.ajax({
            type: "POST",
            dataType: 'html',
            url: 'controle.php',
            data: dados,
            beforeSend: function () {
                loading();
            }, success: function (retorno) {
                if (retorno != 'Você não está logado!') {
                    setTimeout(function () {
                        loadingEnd();
                        $('div#content').html(retorno);
                    }, 1000);
                } else {
                    msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
                }

            }
        });
    });

    // abrir e fechar a sidebar
    $('#btnMenu').click(function () {
        document.getElementById("homeSidebar").style.width = "25%";
    });

    $('#closeSidebar').click(function () {
        document.getElementById("homeSidebar").style.width = "0";
    })

});

function hideCard() {
    document.getElementById('fazComCard').style.display = 'none';
}

function showCard() {
    document.getElementById('fazComCard').style.display = 'block';
}


function masks() {
    $('.maskCPF').inputmask({
        mask: '999.999.999-99'
    });

    $('.maskDate').inputmask({
        mask: '99/9999'
    });

}

function listarPage(listar) {

    let dados = {
        acao: listar,
    };

    $.ajax({
        type: "POST",
        dataType: 'html',
        url: 'controle.php',
        data: dados,
        beforeSend: function () {

        }, success: function (retorno) {
            $('div#content').html(retorno);
        }
    });
}


var sendAddCom = false;

function addComission(idVend) {

    console.log('botao');

    if (!sendAddCom) {

        $('#formComission').submit(function (event) {
            event.preventDefault();

            let form = this;

            let dadosForm = $(this).serializeArray();

            dadosForm.push(
                {name: 'acao', value: 'addCom'},
                {name: 'idVend', value: idVend},
            )

            // var dados = {
            //     acao: 'addCliente',
            // }

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'controle.php',
                data: dadosForm,
                beforeSend: function () {

                },
                success: function (retorno) {
                    // console.log(retorno);

                    if (retorno === 'OK') {
                        $('#modalAddCliente').modal('hide');
                        msgGeral('Cadastro efetuado com sucesso!', 'success');
                        form.reset();
                    } else {
                        msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
                    }

                }

            });

        });

        sendAddCom = true;

        return;

    } else {

        return;

    }

}


var sendDeslogUser = false;

function deslogBtn() {

    // console.log('botao');

    if (!sendDeslogUser) {

        Swal.fire({
            title: "Você tem certeza?",
            text: "Essa ação irá te deslogar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#C999AF',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Não, cancelar!',
            confirmButtonText: 'Sim, sair!'
        }).then((result) => {
            if (result.isConfirmed) {

                var dados = {
                    acao: 'deslogUser'
                };

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: 'controle.php',
                    data: dados,
                    beforeSend: function () {

                    }, success: function (retorno) {

                        if (retorno === 'OK') {
                            Swal.fire({
                                title: 'Desconectado!',
                                text: 'Você foi desconectado de nosso site.',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500

                            })
                            setTimeout(function () {
                                window.location.reload();
                            }, 1500);
                        } else if (retorno === 'OKCart') {
                            Swal.fire({
                                title: 'Desconectado!',
                                text: 'Você foi desconectado de nosso site.',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500

                            })
                            setTimeout(function () {
                                listarPage('listarHome');
                                window.location.reload();
                            }, 1500);
                        } else {
                            Swal.fire({
                                title: 'Erro!',
                                text: retorno,
                                icon: 'error',
                                showConfirmButton: true,
                                timer: 1500
                            })
                        }

                    }
                });
            }
        })

        sendDeslogUser = true;

        return;

    } else {

        return;

    }

}

var sendAddUser = false;

function addUser() {

    console.log('botao');

    if (!sendAddUser) {

        $('#frmAddUser').submit(function (event) {
            event.preventDefault();

            let form = this;

            let dadosForm = $(this).serializeArray();

            dadosForm.push(
                {name: 'acao', value: 'addUser'},
            )

            // var dados = {
            //     acao: 'addCliente',
            // }

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'controle.php',
                data: dadosForm,
                beforeSend: function () {

                },
                success: function (retorno) {

                    if (retorno === 'OK') {
                        $('#modalAddUser').modal('hide');
                        msgGeral('Cadastro efetuado com sucesso!', 'success');
                        form.reset();
                    } else {
                        msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
                    }

                }

            });

        });

        sendAddUser = true;

        return;

    } else {

        return;

    }

}


function addPedidoCart() {

    $('#frmAddPedido').submit(function (event) {
        event.preventDefault();

        let dadosForm = $(this).serializeArray();

        dadosForm.push(
            {name: 'acao', value: 'addPedido'},
        )

        // var dados = {
        //     acao: 'addCliente',
        // }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controle.php',
            data: dadosForm,
            beforeSend: function () {

            },
            success: function (retorno) {

                console.log(retorno);

                if (retorno === 'OK') {
                    $('#modalFinalizarPedido').modal('hide');
                    msgGeral('Pedido efetuado com sucesso!', 'success');

                    setTimeout(function () {
                        window.location.reload();
                    }, 1500);
                } else {
                    msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
                }

            }

        });

    });

}


function addCompra() {

    $('#frmAddPedido').submit(function (event) {
        event.preventDefault();

        let dadosForm = $(this).serializeArray();

        dadosForm.push(
            {name: 'acao', value: 'addPedido'},
        )

        // var dados = {
        //     acao: 'addCliente',
        // }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controle.php',
            data: dadosForm,
            beforeSend: function () {

            },
            success: function (retorno) {

                console.log(retorno);

                // if (retorno === 'OK') {
                //     $('#modalAddCompra').modal('hide');
                //     msgGeral('Cadastro efetuado com sucesso!', 'success');

                //     setTimeout(function () {
                //         window.location.reload();
                //     }, 1500);
                // } else {
                //     msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
                // }

            }

        });

    });

}


// var sendAddCart = false;

function addCarrinho(id) {

    // console.log('botao');

    // if (!sendAddCart) {

        // $('#btnAddCart').click(function (event) {
        //     event.preventDefault();

        // dadosForm.push(
        //     { name: 'acao', value: 'addCarrinho' },
        //     { name: 'id', value: id },
        // )

        var dadosForm = {
            acao: 'addCarrinho',
            id: id,
        }

        // console.log(dadosForm);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controle.php',
            data: dadosForm,
            beforeSend: function () {

            },
            success: function (retorno) {

                // console.log(retorno);

                if (retorno === 'OK') {
                    $('#modalAddCompra').modal('hide');
                    msgGeral('Adicionado ao carrinho com sucesso!', 'success');

                    setTimeout(function () {
                        listarPage('listarCarrinho');
                    }, 1500);

                } else {
                    msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
                }

            }

        });

    //     sendAddCart = true;
    //
    //     return;
    //
    // } else {
    //
    //     return;
    //
    // }

}


function plusCart(id) {

    // console.log('botao');

    // if (!sendAddCart) {

    // $('#btnAddCart').click(function (event) {
    //     event.preventDefault();

    // dadosForm.push(
    //     { name: 'acao', value: 'addCarrinho' },
    //     { name: 'id', value: id },
    // )

    var dadosForm = {
        acao: 'addCarrinho',
        id: id,
    }

    // console.log(dadosForm);

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'controle.php',
        data: dadosForm,
        beforeSend: function () {

        },
        success: function (retorno) {

            // console.log(retorno);

            if (retorno === 'OK') {

                    listarPage('listarCarrinho');

            } else {
                msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
            }

        }

    });

    //     sendAddCart = true;
    //
    //     return;
    //
    // } else {
    //
    //     return;
    //
    // }

}



function excCarrinho(id, qtdd) {

        var dadosForm = {
            acao: 'excCarrinho',
            qtdd: qtdd,
            id: id,
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controle.php',
            data: dadosForm,
            beforeSend: function () {

            },
            success: function (retorno) {

                // console.log(retorno);

                if (retorno === 'OK') {
                    listarPage('listarCarrinho');
                } else {
                    msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');
                }

            }

        });

}


function logUser() {

    $('#frmLogUser').submit(function (event) {
        event.preventDefault();

        let dadosForm = $(this).serializeArray();

        dadosForm.push(
            {name: 'acao', value: 'logUser'},
        )

        // var dados = {
        //     acao: 'addCliente',
        // }

        // console.log('botao1');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'controle.php',
            data: dadosForm,
            beforeSend: function () {
                // console.log('botao2');

            },
            success: function (retorno) {
                console.log(retorno);

                if (retorno === 'OK') {

                    $('#modalLogUser').modal('hide');
                    msgGeral('Login efetuado com sucesso!', 'success');

                    setTimeout(function () {
                        window.location.reload();
                    }, 1500);

                } else {

                    msgGeral('ERRO: ' + retorno + ' Tente novamente mais tarde.', 'error');

                }

            }

        });

    });

}


// funções de alterar

function dataArtist(id) {

    var dados = {
        acao: 'dataArtista',
        id: id,
    };

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: 'controle.php',
        data: dados,
        beforeSend: function () {

        }, success: function (retorno) {

            var status = retorno.status;

            if (status === 'OK') {
                $('#' + modal).modal('show');
                $('input#nomeUsuarioAlt').val(retorno.dadosArray['nome']);
                $('input#emailUsuarioAlt').val(retorno.dadosArray['email']);
                $('input#cpfUsuarioAlt').val(retorno.dadosArray['cpf']);
                $('input#senhaUsuarioAlt').val(retorno.dadosArray['senha']);
                $('input#inputAltCliente').val(id);
            } else {
                Swal.fire({
                    title: 'Erro!',
                    text: retorno,
                    icon: 'error',
                    showConfirmButton: true,
                })
            }

        }
    });

}


function msgGeral(msg, tipo) {
    Swal.fire({
        position: 'center',
        icon: tipo,
        title: msg,
        showConfirmButton: false,
        timer: 1500
    })
}

function loading() {
    Swal.fire({
        title: 'Carregando...',
        html: 'Aguarde um momento.',
        didOpen: () => {
            Swal.showLoading()
        }
    })

}

function loadingEnd() {
    Swal.close();
}