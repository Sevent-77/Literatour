<?php include '../app/view/header.php'; ?>

<link rel="stylesheet" href="<?= URL ?>/public/css/style3.css" type="text/css">
<link rel="stylesheet" href="<?= URL ?>/public/css/style.css" type="text/css">
<link rel="stylesheet" href="<?= URL ?>/public/css/style1.css" type="text/css">

<body>
    <main>
        <div class="container-perfil">
            <div class="left box-primary">
                <img class="image" src="./imagem-perfil.jpg" alt="" />

                <?php if (isset($_SESSION['usuario_nome'])): ?>
                    <h3 class="username text-center">
                        <?= $_SESSION["usuario_nome"] ?>
                    </h3>
                <?php else: ?>
                    <h3 class="username text-center">Nome do usuário</h3>
                <?php endif; ?>

                <a href="<?= URL ?>/usuarios/sair" class="btn btn-primary btn-block"><b>Sair</b></a>

            </div>
            <div class="right tab-content">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nome</label>

                        <div class="col-sm-10">

                            <?php if (isset($_SESSION['usuario_nome'])): ?><input type="email" class="form-control"
                                    id="inputName" placeholder="<?= $_SESSION["usuario_nome"] ?>">
                            <?php else: ?>
                                <input type="email" class="form-control" id="inputName" placeholder="Usuário">
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">

                            <?php if (isset($_SESSION['usuario_nome'])): ?>
                                <input type="email" class="form-control" id="inputEmail"
                                    placeholder="<?= $_SESSION["usuario_email"] ?>">
                            <?php else: ?>
                                <input type="email" class="form-control" id="inputEmail" placeholder="usuario@gmail.com">
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 has-feedback">
                            <label for="" class="control-label">INFORMAÇÕES SOBRE O USUÁRIO </label>

                            <textarea name="text" id="textarea-sobre" cols="50" rows="10"></textarea>

                        </div>
                    </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Salvar alterações</button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </main>
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget();
    </script>
</body>

</html>