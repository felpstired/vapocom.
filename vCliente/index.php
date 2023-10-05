<!doctype html>
<html lang="pt-BR">

<head>

    <?php

    // Incluindo arquivos com as funções necessárias para o funcionamento do site
    include_once './config/constantes.php';
    include_once './config/conexao.php';
    include_once './func/dashboard.php';
    include_once './func/functions.php';

    ?>


    <!-- 
    Essa tag é usada para definir o link do site, mas não será usada
    Ela está aqui apenas para fins de teste
    -->
    <base href="index.php" target="">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicons (icones que aparecem na aba do site) -->
    <link href="assets/img/logo/favicon/favicon.ico" rel="icon">
    <link href="assets/img/logo/favicon/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- conteúdo importante para o navegador (aparece nos resultados de pesquisa) -->
    <meta content="Traços que falam, cores que emocionam. vapocom." name="description">
    <meta content="arte, desenho, artistas, comissão, comissões, pintura, venda, compra, loja, vendedor, parceiros"
          name="keywords">

    <!-- link para o css do bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- link para os icons -->
    <link rel="stylesheet" type="text/css"
          href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">

    <!-- link para a fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400&display=swap"
          rel="stylesheet">

    <title>vapocom. | Venda e Compre Artes!</title>

</head>

<body>

<div class="body">

    <?php

    // Arquivo com a navbar do site
    include_once './menutop.php';

    ?>

    <div id="corpo" class="container-fluid">

        <div class="corp">

            <div id="content">

                <?php

                // ---- Esse trecho controla as páginas que serão mostradas ---- //


                // Essa parte em específico não está sendo usada, mas pode vir a ter uso futuramente
                if (!empty($_GET['page'])) {
                    $sp = $_GET['page'];
                    if ($sp == '') {
                        include_once './erro.php';
                    } else {
                        include_once './erro.php';
                    }


                    // Essa parte faz com que a o site permaneça na página atual caso o usuário atualize a página (refresh / F5)
                } else if (isset($_SESSION['pages'])) {
                    if ($_SESSION['pages'] == 'listarArtists') {
                        include_once './artistas.php';
                    } else if ($_SESSION['pages'] == 'listarHome') {
                        include_once './home.php';
                    } else if ($_SESSION['pages'] == 'listarArtes') {
                        include_once './artes.php';
                    } else if ($_SESSION['pages'] == 'listarCarrinho') {
                        include_once './listarCarrinho.php';
                    } else if ($_SESSION['pages'] == 'addCom') {
                        include_once './fazerComissao.php';
                    }


//                    Essa parte lida com as páginas individuais de cada artista
                    else if ($_SESSION['pages'] == 'artistaZashye') {
                        include_once './artistU/artistaZashye.php';
                    } else if ($_SESSION['pages'] == 'artistajov') {
                        include_once './artistU/artistajov.php';
                    } else if ($_SESSION['pages'] == 'artistafelpstired') {
                        include_once './artistU/artistafelpstired.php';
                    } else if ($_SESSION['pages'] == 'artistathwmoss') {
                        include_once './artistU/artistathwmoss.php';
                    }


                    //                    Essa parte lida com as páginas individuais de cada arte
                    else if ($_SESSION['pages'] == 'artZashyeOC') {
                        include_once './artesU/artZashyeOC.php';
                    } else if ($_SESSION['pages'] == 'artjovDio') {
                        include_once './artesU/artjovDio.php';
                    } else if ($_SESSION['pages'] == 'artjovHanako') {
                        include_once './artesU/artjovHanako.php';
                    } else if ($_SESSION['pages'] == 'artjovMiruko') {
                        include_once './artesU/artjovMiruko.php';
                    } else if ($_SESSION['pages'] == 'artfelpstiredFelps') {
                        include_once './artesU/artfelpstiredFelps.php';
                    } else if ($_SESSION['pages'] == 'artthwmossOC') {
                        include_once './artesU/artthwmossOC.php';
                    } else if ($_SESSION['pages'] == 'artthwmossfelps') {
                        include_once './artesU/artthwmossfelps.php';
                    } else if ($_SESSION['pages'] == 'artthwmossPaulo') {
                        include_once './artesU/artthwmossPaulo.php';
                    } 



                    // Essa parte faz aparecer por padrão a página HOME.PHP no site assim que iniciado
                } else {
                    include_once './home.php';
                }


                // ---- Fim do trecho que controla as páginas ---- //

                ?>


            </div>

        </div>

    </div>


    <?php


    // Arquivo com o rodapé do site
    include_once './footer.php';

    // Arquivo com a barra lateral
    include_once './sidebar.php';

    ?>

</div>


<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="modalAddUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-p1 text-p3">
                <h3 class="modal-title" id="staticBackdropLabel"><span class="mdi mdi-account-plus"></span> Cadastrar
                    Usuário</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frmAddUser" name="frmAddUser" method="post" action="#">

                <div class="modal-body text-p3">

                    <div class="form-group">
                        <label for="nomeUser"><span class="mdi mdi-account"></span> Nome:</label>
                        <input type="text" class="form-control form-control-sm" id="nomeUser" name="nomeUser"
                               placeholder="Insira seu nome...">
                    </div>

                    <div class="form-group">
                        <label for="emailUser"><span class="mdi mdi-email"></span> E-mail:</label>
                        <input type="email" class="form-control form-control-sm" id="emailUser" name="emailUser"
                               placeholder="Insira seu e-mail...">
                    </div>

                    <div class="form-group">
                        <label for="cpfUser"><span class="mdi mdi-card-account-details"></span> CPF:</label>
                        <input type="text" class="form-control form-control-sm maskCPF" id="cpfUser" name="cpfUser"
                               placeholder="Insira seu CPF...">
                    </div>

                    <div class="form-group">
                        <label for="senhaUser"><span class="mdi mdi-lock"></span> Senha:</label>
                        <input type="password" class="form-control form-control-sm" id="senhaUser" name="senhaUser"
                               placeholder="Insira uma senha...">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span
                                    class="mdi mdi-close"></span> Cancelar
                        </button>
                        <button type="submit" class="btn bg-p1 text-p3" onclick="addUser();"><span
                                    class="mdi mdi-account-plus"></span> Cadastrar
                        </button>
                    </div>

                </div>

            </form>


            <div id="resultForm"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalLogUser" tabindex="-1" role="dialog" aria-labelledby="modalLogUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-p1 text-p3">
                <h3 class="modal-title" id="staticBackdropLabel"><span class="mdi mdi-login"></span> Fazer Login</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frmLogUser" name="frmLogUser" method="post" action="#">

                <div class="modal-body text-p3">

                    <div class="form-group">
                        <label for="cpfLogUser"><span class="mdi mdi-card-account-details"></span> CPF:</label>
                        <input type="text" class="form-control form-control-sm maskCPF" id="cpfLogUser"
                               name="cpfLogUser" placeholder="Insira seu CPF...">
                    </div>

                    <div class="form-group">
                        <label for="senhaLogUser"><span class="mdi mdi-lock"></span> Senha:</label>
                        <input type="password" class="form-control form-control-sm" id="senhaLogUser"
                               name="senhaLogUser" placeholder="Insira uma senha...">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span
                                    class="mdi mdi-close"></span> Cancelar
                        </button>
                        <button type="submit" class="btn bg-p1 text-p3" onclick="logUser();"><span
                                    class="mdi mdi-account-plus"></span> Fazer Login
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>

<!-- link do javascript do bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

<!-- link do jquery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

<!-- link da mascara (que usa jquery) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"
        integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- link para os alerts customizados -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- link do nosso javascript  -->
<script src="./assets/js/script.js"></script>

</body>

</html>