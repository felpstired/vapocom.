<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">

    <title>Página de Produtos</title>
</head>

<body>

    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header bg-dark text-white">
                <h4><span class="mdi mdi-format-list-bulleted"></span>

                    Lista de Produtos
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalAddProduto"><span class="mdi mdi-plus-thick"></span> Cadastrar Produto
                    </button>
                </h4>

            </div>
            <div class="card-body">
                <div id="showpage">
                    <?php

                    include_once './produto/listarProduto.php';

                    ?>
                </div>
            </div>
        </div>
        <div class="card mt-3 p-2">
            <h4><a href="./index.php" class="text-success" target="">>> Página de Clientes</a></h4>
        </div>
    </div>

    <!-- Modal Cadastrar -->
    <div class="modal fade" id="modalAddProduto" tabindex="-1" role="dialog" aria-labelledby="modalAddProduto" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
                <form id="frmAddProduto" name="frmAddProduto" method="POST" action="#">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="InputCadProduto">Produto:</label>
                            <input type="text" class="form-control" name="InputCadProduto" id="InputCadProduto" placeholder="Insira o nome do produto..." maxlength="60">
                        </div>
                        <div class="form-group">
                            <label for="InputCadDescricao">Descrição:</label>
                            <textarea class="form-control" name="InputCadDescricao" id="InputCadDescricao" placeholder="Insira uma descrição para o produto..." rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="InputCadValor">Valor:</label>
                            <input type="text" class="form-control maskValor" data-thousands="." data-decimal="," data-prefix="R$ " name="InputCadValor" id="InputCadValor maskValor" placeholder="Insira um valor para o produto..." maxlength="45">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="mdi mdi-close"></span> Cancelar</button>
                        <button type="submit" class="btn btn-success" onclick="addProduto();"><span class="mdi mdi-plus-thick"></span> Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal Ativar -->
    <div class="modal fade" id="modalAtivarProduto" tabindex="-1" role="dialog" aria-labelledby="modalAtivarProduto" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ativar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h4>Desejar ativar este registro?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="mdi mdi-close"></span> Cancelar</button>
                    <button type="submit" id="btnAtivar" class="btn btn-success"><span class="mdi mdi-check-bold"></span>
                        Ativar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Desativar -->
    <div class="modal fade" id="modalDesativarProduto" tabindex="-1" role="dialog" aria-labelledby="modalDesativarProduto" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Desativar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h4>Desejar desativar este registro?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="mdi mdi-close"></span> Cancelar</button>
                    <button type="submit" id="btnDesativar" class="btn btn-success"><span class="mdi mdi-block-helper"></span>
                        Desativar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Alterar -->
    <div class="modal fade" id="modalAltProduto" tabindex="-1" role="dialog" aria-labelledby="modalAltProduto" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
                <form id="frmAltProduto" name="frmAltProduto" method="POST" action="#">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="InputAltProduto">Produto</label>
                            <input type="text" class="form-control" name="InputAltProduto" id="InputAltProduto" placeholder="Produto">
                        </div>
                        <div class="form-group">
                            <label for="InputAltDescricao">Descricao</label>
                            <input type="text" class="form-control" name="InputAltDescricao" id="InputAltDescricao" placeholder="Descricao">
                        </div>
                        <div class="form-group">
                            <label for="InputAltValor">Valor</label>
                            <input type="text" class="form-control maskValor" name="InputAltValor" id="InputAltValor" placeholder="Valor">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="mdi mdi-close"></span>Cancelar</button>
                        <button type="submit" class="btn btn-success"><span class="mdi mdi-lead-pencil"></span>
                            Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!-- <script src="./js/jquery.mask.js"></script>
    <script src="./js/jquery.mask.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/painel.js"></script>
</body>

</html>