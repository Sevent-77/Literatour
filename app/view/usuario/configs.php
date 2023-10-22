<?php include '../app/view/header.php'; ?>

<link rel="stylesheet" href="<?= URL ?>/public/css/style3.css" type="text/css">
<link rel="stylesheet" href="<?= URL ?>/public/css/style.css" type="text/css">
<link rel="stylesheet" href="<?= URL ?>/public/css/style1.css" type="text/css">
    <body>
        <main>
            <div class="container-perfil">
                <div class="left box-primary">
                    <img class="image" src="./imagem-perfil.jpg" alt="" />
                    <h3 class="username text-center">João</h3>
                    <a href="#" class="btn btn-primary btn-block"><b>Editar foto</b></a>
                </div>
                <div class="right tab-content">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Nome</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="João">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="joao@gmail.com">
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
    </body>

</body>

</html>