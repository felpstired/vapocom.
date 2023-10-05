<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$listar = listarGeral('idusuario, nome, senha, cpf, email, ativo', 'tbusuario');

?>

<div class="card mt-3">
    <div class="card-header bg-p2 text-white">
        <h4><span class="mdi mdi-account-group"></span> Lista de Usuários
            <button type="button" class="btn btn-p2 text-white float-right" data-toggle="modal" data-target="#modalAddCliente">Adicionar Registros <span class="mdi mdi-account-plus"></span></button>
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-hover text-center">
            <thead class="bg-p2 text-white">
                <tr>
                    <th scope="col" width="5%"><span class="mdi mdi-cat"></span> ID</th>
                    <th scope="col" width="20%"><span class="mdi mdi-account"></span> Nome</th>
                    <th scope="col" width="20%"><span class="mdi mdi-email"></span> E-Mail</th>
                    <th scope="col" width="20%"><span class="mdi mdi-card-account-details"></span> CPF</th>
                    <th scope="col" width="20%"><span class="mdi mdi-lock-open"></span> Senha</th>
                    <th scope="col" width="5%"><span class="mdi mdi-alert-circle-outline"></span> Status</th>
                    <th scope="col" width="10%"><span class="mdi mdi-view-dashboard-edit"></span> Ação</th>
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

                    foreach ($listar as $listarCliente) {
                        $id = $listarCliente->idusuario;
                        $nome = $listarCliente->nome;
                        $email = $listarCliente->email;
                        $cpf = $listarCliente->cpf;
                        $senha = $listarCliente->senha;
                        $ativo = $listarCliente->ativo;

                    ?>
                        <tr>
                            <th scope="row"><?php echo $id; ?></th>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $cpf; ?></td>
                            <td><?php echo $senha; ?></td>
                            <td><?php echo $ativo; ?></td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <?php

                                    if ($ativo === 'A') {

                                    ?>

                                        <button type="button" class="btn btn-danger" onclick="ativGeral(<?php echo $id; ?>, 'ativarCliente', 'listarCliente');">Desativar <span class="mdi mdi-lock"></span></button>

                                    <?php

                                    } elseif ($ativo === 'D') {

                                    ?>

                                        <button type="button" class="btn btn-success" onclick="ativGeral(<?php echo $id; ?>, 'ativarCliente', 'listarCliente');">Ativar <span class="mdi mdi-lock-open"></span></button>

                                    <?php

                                    } else {

                                    ?>

                                        <button type="button" class="btn btn-warning disabled">Erro <span class="mdi mdi-alert"></span></button>

                                    <?php
                                    }


                                    ?>
                                    <button type="button" class="btn btn-p2" onclick="dataCliente(<?php echo $id; ?>, 'modalAltCliente');">Alterar <span class="mdi mdi-pencil"></span></button>



                                    <button type="button" class="btn btn-danger" onclick="msgDelete(<?php echo $id; ?>, 'excCliente', 'listarCliente');">Excluir <span class="mdi mdi-delete"></span></button>


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

<div class="modal fade" id="modalAddCliente" tabindex="-1" role="dialog" aria-labelledby="modalAddCliente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-p3 text-white">
                <h5 class="modal-title" id="cadastrarClienteModal"><span class="mdi mdi-account-plus"></span> Cadastrar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <form id="frmAddCliente" name="frmAddCliente" method="post" action="#">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="nomeUsuario"><span class="mdi mdi-account"></span> Usuário:</label>
                        <input type="text" class="form-control form-control-sm" id="nomeUsuario" name="nomeUsuario" placeholder="Insira seu nome..." required>
                    </div>

                    <div class="form-group">
                        <label for="emailUsuario"><span class="mdi mdi-email"></span> E-mail:</label>
                        <input type="email" class="form-control form-control-sm maskTelefone" id="emailUsuario" name="emailUsuario" placeholder="Insira seu e-mail..." required>
                    </div>

                    <div class="form-group">
                        <label for="cpfUsuario"><span class="mdi mdi-card-account-details"></span> CPF:</label>
                        <input type="text" class="form-control form-control-sm maskCPF" id="cpfUsuario" name="cpfUsuario" placeholder="Insira seu CPF..." required>
                    </div>

                    <div class="form-group">
                        <label for="senhaUsuario"><span class="mdi mdi-lock-open"></span> Senha:</label>
                        <input type="password" class="form-control form-control-sm" id="senhaUsuario" name="senhaUsuario" placeholder="Insira uma senha..." required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="mdi mdi-close"></span> Cancelar</button>
                        <button type="submit" class="btn btn-success" onclick="addCliente();"><span class="mdi mdi-account-plus"></span> Cadastrar</button>
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>

<!-- modal de cadastro termina aqui uau uau uau uau uau -->


<!-- //////////////////// -->


<!-- modal de ativar começa aqui uau uau uau -->

<div class="modal fade" id="modalAtivCliente" tabindex="-1" role="dialog" aria-labelledby="modalAtivCliente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border border-success">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalAtivCliente"><span class="mdi mdi-lock-open"></span> Ativar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h4>Deseja ativar esse registro?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnAtivar" class="btn btn-success">Ativar</button>
            </div>
        </div>
    </div>
</div>

<!-- modal de ativar termina aqui uau uau uau uau uau -->

<!-- //////////////////// -->

<!-- modal de desativar começa aqui uau uau uau -->

<div class="modal fade" id="modalDesatCliente" tabindex="-1" role="dialog" aria-labelledby="modalDesatCliente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border border-danger">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalDesatCliente"><span class="mdi mdi-lock-open"></span> Desativar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h4>Deseja desativar esse registro?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnDesativar" class="btn btn-success">Desativar</button>
            </div>
        </div>
    </div>
</div>

<!-- modal de ativar termina aqui uau uau uau uau uau -->


<!-- //////////////////// -->


<!-- modal de alterar começa aqui uau uau uau -->

<div class="modal fade" id="modalAltCliente" tabindex="-1" role="dialog" aria-labelledby="modalAltCliente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border border-secondary">
            <div class="modal-header bg-p3 text-white">
                <h5 class="modal-title" id="exampleModalLongTitle"><span class="mdi mdi-pencil"></span> Alterar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <form id="frmAltCliente" name="frmAltCliente" method="post" action="#">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="nomeUsuarioAlt"><span class="mdi mdi-account"></span> Usuário:</label>
                        <input type="text" class="form-control form-control-sm" id="nomeUsuarioAlt" name="nomeUsuarioAlt" placeholder="Insira seu nome..." required>
                    </div>

                    <div class="form-group">
                        <label for="emailUsuarioAlt"><span class="mdi mdi-email"></span> E-mail:</label>
                        <input type="email" class="form-control form-control-sm maskTelefone" id="emailUsuarioAlt" name="emailUsuarioAlt" placeholder="Insira seu e-mail..." required>
                    </div>

                    <div class="form-group">
                        <label for="cpfUsuarioAlt"><span class="mdi mdi-card-account-details"></span> CPF:</label>
                        <input type="text" class="form-control form-control-sm maskCPF" id="cpfUsuarioAlt" name="cpfUsuarioAlt" placeholder="Insira seu CPF..." required>
                    </div>

                    <div class="form-group">
                        <label for="senhaUsuarioAlt"><span class="mdi mdi-lock-open"></span> Senha:</label>
                        <input type="password" class="form-control form-control-sm" id="senhaUsuarioAlt" name="senhaUsuarioAlt" placeholder="Insira uma senha..." required>
                    </div>

                    <input type="hidden" value="" id="inputAltCliente" name="inputAltCliente">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="mdi mdi-close"></span> Cancelar</button>
                        <button type="submit" class="btn btn-success" onclick="altCliente();"><span class="mdi mdi-account-plus"></span> Alterar</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

<!-- modal de alterar termina aqui uau uau uau uau uau -->