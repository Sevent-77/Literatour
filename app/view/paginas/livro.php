<?php include '../app/view/header.php'; ?>
<link rel="stylesheet" href="<?= URL ?>/public/css/style.css" type="text/css">
<link rel="stylesheet" href="<?= URL ?>/public/css/style1.css" type="text/css">
<div id="livro">
    <h2>
        <?php if ($dados): ?>
            <?= $dados->livro_nome ?>
        </h2>
        <img src="<?= URL ?>/public/img/<?= $dados->img_path ?> " style="width:300px;">
        <h4>
            <?= $dados->autor_nome ?> (
            <?= $dados->ano_publi ?>)
        </h4>

        <a>
            <?= $dados->cate_nome ?>
        </a>
        <h2>Sinopse</h2>
        <p>
            <?= $dados->livro_sinopse ?>
        </p>
        <h2>Resesnha</h2>
        <form action="<?= URL ?>/resenhas/cadastrar/<?= $dados->id_livro ?>" method="post">
            <textarea name="texto" id="" cols="100" rows="2"></textarea>
            <input type="submit" value="Enviar">
        </form>
        <?php
        $resenhas = $valor;
        if ($resenhas == []):
            echo '<h3>Resesnhas não encontradas</h3>';
        else:
            echo '<div class="div-resenha">';
            foreach ($resenhas as $resenha): ?>
                <h3>
                    <?= $resenha->user_nome ?>
                </h3>
                <h3>
                    <?= $resenha->resen_horario ?>
                </h3>
                <p>
                    <?= $resenha->resen_texto ?>
                </p>

                <button onclick="toggleReplyInput(<?= $resenha->id_resenha ?>)"><a style="color:#000000;">Responder</a></button>
                <div id="reply-input-<?= $resenha->id_resenha ?>" style="display: none;">
                    <form action="<?= URL ?>/resenhas/cadastrarResposta/<?= $resenha->id_resenha ?>/<?= $dados->id_livro ?>"
                        method="post">
                        <textarea name="texto" id="" cols="100" rows="2"></textarea>
                        <input type="submit" value="Enviar">
                    </form>

                </div>
                <br><br>
                <hr>
                <h4>Respostas</h4>

                <?php
                $this->livroModel = $this->model('Livro');
                $respostas = $this->livroModel->Resposta($resenha->id_resenha);
                if ($respostas == []): 
                    echo '<p>Respostas não encontradas</p>';
                else:
                    echo '<div class="div-resposta">';
                    
                    foreach ($respostas as $resposta): ?>
                        <h3>
                            <?= $resposta->user_nome ?>
                        </h3>
                        <h3>
                            <?= $resposta->resp_horario ?>
                        </h3>
                        <p>
                            <?= $resposta->resposta_text ?>
                        </p>
                        <?php
                    endforeach;
                    echo '</div>';
                endif;
                echo '<hr>';
            endforeach;
            echo '</>';
        endif;
        else:
            URL::redirecionar('');
        endif;
        ?>

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
</div>
<script>
    // JavaScript para mostrar/ocultar o campo de resposta
    function toggleReplyInput(resenhaId) {
        const replyInput = document.getElementById(`reply-input-${resenhaId}`);
        replyInput.style.display = (replyInput.style.display === 'none' || !replyInput.style.display) ? 'block' : 'none';
    }
</script>