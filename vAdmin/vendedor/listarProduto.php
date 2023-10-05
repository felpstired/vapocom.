<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$listar = listarGeral('idvendedor, idusuario, totalCom, totalAval, mediaAval, descVend, fotoVend, ativo', 'tbvendedor');

?>

<div class="card mt-3">
    <div class="card-header bg-p2 text-white">
        <h4><span class="mdi mdi-account-group"></span> Lista de Vendedores
            <button type="button" class="btn btn-p2 text-white float-right" data-toggle="modal" data-target="#modalAddCliente">Adicionar Registros <span class="mdi mdi-plus"></span></button>
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr class="text-center bg-p2 text-white">
                    <th scope="col" width="4%"><span class="mdi mdi-identifier"></span>
                        ID</th>
                    <th scope="col" width="15%"><span class="mdi mdi-image"></span></span>
                        Foto</th>
                    <th scope="col" width="15%"><span class="mdi mdi-account"></span>
                        Nome</th>
                    <th scope="col" width="20%"><span class="mdi mdi-text-box-multiple-outline"></span>
                        Descrição</th>
                    <th scope="col" width="6%"><span class="mdi mdi-basket"></span>
                        Comissões</th>
                    <th scope="col" width="6%"><span class="mdi mdi-message-star-outline"></span>
                        Avaliações</th>
                    <th scope="col" width="6%"><span class="mdi mdi-account-star"></span>
                        Média de Avaliações</th>
                    <th scope="col" width="4%"><span class="mdi mdi-alert-circle-outline"></span>
                        Status</th>
                    <th scope="col" width="10%"><span class="mdi mdi-view-dashboard-edit"></span>
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
                        $id = $itemLista->idvendedor;
                        $idU = $itemLista->idusuario;
                        $comms = $itemLista->totalCom;
                        $avals = $itemLista->totalAval;
                        $mAvals = $itemLista->mediaAval;
                        $descVend = $itemLista->descVend;
                        $foto = $itemLista->fotoVend;
                        $ativo = $itemLista->ativo;

                        $listar2 = listarTodosRegistroUNum('tbusuario', 'nome', 'idusuario', $idU);

                        if ($listar == 'Vazio') {

                    ?>

                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-danger text-center" role="alert">Não há registros no banco!</div>
                                </td>
                            </tr>

                            <?php

                        } else {

                            foreach ($listar2 as $itemLista2) {
                                $nomeV = $itemLista2->nome;


                            ?>
                                <tr class="text-center">
                                    <th scope="row"><?php echo $id; ?></th>
                                    <td class="imgArtista"><img src="./img/artesArtista/<?php echo $foto; ?>" alt=""></td>
                                    <td><?php echo $nomeV; ?></td>
                                    <td><?php echo $descVend; ?></td>
                                    <td><?php echo $comms; ?></td>
                                    <td><?php echo $avals; ?></td>
                                    <td><?php echo $mAvals; ?></td>
                                    <td><?php echo $ativo; ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                                            <?php

                                            if ($ativo === 'A') {

                                            ?>

                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDesativarProduto" onclick="ativarGeral(<?php echo $id; ?>, 'desativar', 'btnDesativar', 'ativarProduto', 'DesativarProduto', 'listarProduto');"><span class="mdi mdi-block-helper"></span>
                                                    Desativar</button>

                                            <?php
                                            } elseif ($ativo === 'D') {
                                            ?>


                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAtivarProduto" onclick="ativarGeral(<?php echo $id; ?>, 'ativar', 'btnAtivar', 'ativarProduto', 'AtivarProduto', 'listarProduto');"><span class="mdi mdi-check-bold"></span> Ativar</button>

                                            <?php
                                            } else {
                                            ?>

                                                <button type="button" class="btn btn-danger disabled">Erro</button>

                                            <?php
                                            }
                                            ?>


                                            <button type="button" class="btn btn-p2"> <span class="mdi mdi-lead-pencil"></span> Alterar</button>


                                            <button type="button" class="btn btn-danger" onclick="msgDelete(<?php echo $id; ?>, 'excProduto','listarProduto');"><span class="mdi mdi-trash-can"></span>
                                                Excluir</button>
                                        </div>
                                    </td>
                                </tr>
                <?php

                            }
                        }
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>