<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $listar = listarRegistrosJoin2('tbusuario.nome, tbartesvend.idartesvend, tbartesvend.imgarte, tbartesvend.titulo, tbartesvend.descricao, tbartesvend.valor, tbartesvend.copias, tbartesvend.ativo',
        'tbartesvend',
        'inner',
        'tbvendedor',
        'idvendedor',
        'inner',
        'tbusuario',
        'idusuario');

?>

<div class="card mt-3">
    <div class="card-header bg-p2 text-white">
        <h4><span class="mdi mdi-account-group"></span> Lista de Tipos de Pagamento
            <button type="button" class="btn btn-p2 text-white float-right" data-toggle="modal" data-target="#modalAddTipoPag">Adicionar Registros <span class="mdi mdi-plus"></span></button>
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-hover text-center">
            <thead class="bg-p2 text-white">
                <tr class="text-center bg-p2 text-white">
                    <th scope="col" width="4%">
                        ID</th>
                    <th scope="col" width="10%"><span class="mdi mdi-image"></span></span>
                        Foto</th>
                    <th scope="col" width="10%"><span class="mdi mdi-account"></span>
                        Titulo</th>
                    <th scope="col" width="10%"><span class="mdi mdi-account"></span>
                        Artista</th>
                    <th scope="col" width="25%"><span class="mdi mdi-text-box-multiple-outline"></span>
                        Descrição</th>
                    <th scope="col" width="7%"><span class="mdi mdi-text-box-multiple-outline"></span>
                        Valor</th>
                    <th scope="col" width="10%"><span class="mdi mdi-text-box-multiple-outline"></span>
                        N° Cópias</th>
                    <th scope="col" width="7%"><span class="mdi mdi-text-box-multiple-outline"></span>
                        Status</th>
                    <th scope="col" width="10%"><span class="mdi mdi-text-box-multiple-outline"></span>
                        Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($listar == 'Vazio') {

                ?>

                    <tr>
                        <td colspan="5">
                            <div class="alert alert-danger text-center" role="alert">Não há registros no banco!</div>
                        </td>
                    </tr>

                    <?php

                } else {

                    foreach ($listar as $itemLista) {
                        $idArt = $itemLista->idartesvend;
                        $nomeArt = $itemLista->nome;
                        $img = $itemLista->imgarte;
                        $titulo = $itemLista->titulo;
                        $descArt = $itemLista->descricao;
                        $valor = $itemLista->valor;
                        $copias = $itemLista->copias;
                        $ativo = $itemLista->ativo;

                    ?>
                        <tr>
                            <th scope="row"><?php echo $idArt; ?></th>
                            <td class="imgArtista"><img src="./img/artesArtista/<?php echo $img; ?>" alt=""></td>
                            <td><?php echo $titulo; ?></td>
                            <td><?php echo $nomeArt; ?></td>
                            <td><?php echo $descArt; ?></td>
                            <td><?php echo $valor; ?></td>
                            <td><?php echo $copias; ?></td>
                            <td><?php echo $ativo; ?></td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <?php

                                    if ($ativo === 'A') {

                                    ?>

                                        <button type="button" class="btn btn-danger" onclick="ativGeral(<?php echo $id; ?>, 'ativarTipoPag', 'listarTipoPag');">Desativar <span class="mdi mdi-lock"></span></button>

                                    <?php

                                    } elseif ($ativo === 'D') {

                                    ?>

                                        <button type="button" class="btn btn-success" onclick="ativGeral(<?php echo $id; ?>, 'ativarTipoPag', 'listarTipoPag');">Ativar <span class="mdi mdi-lock-open"></span></button>

                                    <?php

                                    } else {

                                    ?>

                                        <button type="button" class="btn btn-warning disabled">Erro <span class="mdi mdi-alert"></span></button>

                                    <?php
                                    }


                                    ?>
                                    <button type="button" class="btn btn-p2" onclick="dataTipoPag(<?php echo $id; ?>, 'modalAltTipoPag');">Alterar <span class="mdi mdi-pencil"></span></button>



                                    <button type="button" class="btn btn-danger" onclick="msgDelete(<?php echo $id; ?>, 'excTipoPag', 'listarTipoPag');">Excluir <span class="mdi mdi-delete"></span></button>


                                </div>
                            </td>
                        </tr>
                <?php

                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>


<!-- modal de cadastro começa aqui uau uau uau -->

<div class="modal fade" id="modalAddTipoPag" tabindex="-1" role="dialog" aria-labelledby="modalAddTipoPag" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-p3 text-white">
                <h5 class="modal-title" id="cadastrarTipoPagModal"><span class="mdi mdi-account-plus"></span> Cadastrar Tipo de Pagamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <form id="frmAddTipoPag" name="frmAddTipoPag" method="post" action="#">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="tipoPag"><span class="mdi mdi-cash-register"></span> Tipo de Pagamento:</label>
                        <input type="text" class="form-control form-control-sm" id="tipoPag" name="tipoPag" placeholder="Insira um tipo de pagamento..." required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="mdi mdi-close"></span> Cancelar</button>
                        <button type="submit" class="btn btn-success" onclick="addTipoPag();"><span class="mdi mdi-account-plus"></span> Cadastrar</button>
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>

<!-- modal de cadastro termina aqui uau uau uau uau uau -->


<!-- //////////////////// -->


<!-- modal de alterar começa aqui uau uau uau -->

<div class="modal fade" id="modalAltTipoPag" tabindex="-1" role="dialog" aria-labelledby="modalAltTipoPag" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border border-secondary">
            <div class="modal-header bg-p3 text-white">
                <h5 class="modal-title" id="exampleModalLongTitle"><span class="mdi mdi-pencil"></span> Alterar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <form id="frmAltTipoPag" name="frmAltTipoPag" method="post" action="#">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="tipoPagAlt"><span class="mdi mdi-cash-register"></span> Tipo de Pagamento:</label>
                        <input type="text" class="form-control form-control-sm" id="tipoPagAlt" name="tipoPagAlt" placeholder="Insira seu nome..." required>
                    </div>

                    <input type="hidden" value="" id="inputAltTipoPag" name="inputAltTipoPag">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="mdi mdi-close"></span> Cancelar</button>
                        <button type="submit" class="btn btn-success" onclick="altTipoPag();"><span class="mdi mdi-account-plus"></span> Alterar</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

<!-- modal de alterar termina aqui uau uau uau uau uau -->