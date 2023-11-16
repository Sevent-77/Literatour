<link rel="stylesheet" href="<?= URL ?>/public/css/style.css" type="text/css">
<link rel="stylesheet" href="<?= URL ?>/public/css/style1.css" type="text/css">
<header>
    <nav>
        <div class="container">
            <div class="logo-container">
                <img src="<?= URL ?>/public/img/TESTELOGO.png" alt="Descrição da Imagem" width="60">
            </div>
            <a class="logo" href="<?= URL ?>"> <u>LITERATOUR</u></a>
        </div>

        <form class="form" action="<?= URL ?>/paginas/pesquisa" method="get">
            <label for="search">
                <!-- Defino o nome do input como "entry-search" -->
                <input required="" autocomplete="off" placeholder="Procure por livro ou categoria" id="search"
                    type="text" name="entry-search">
                <div class="icon">
                    <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="swap-on">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linejoin="round"
                            stroke-linecap="round"></path>
                    </svg>
                    <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="swap-off">
                        <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linejoin="round" stroke-linecap="round"></path>
                    </svg>
                </div>
                <button type="reset" class="close-btn">
                    <svg viewBox="0 0 20 20" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            fill-rule="evenodd"></path>
                    </svg>
                </button>
            </label>
        </form>
        </div>
        <div>
            <?php if (!isset($_SESSION['usuario_nome'])): ?>
                <button id="login"><a href="<?= URL ?>/usuarios/cadastrar"> LOGIN</a></button>

            <?php endif; ?>

        </div>
        <div class="mobile-menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-list">
            <h3>Mais informações</h3>
            <li><a href="#">Sobre nós</a></li>
            <li><a href="<?= URL ?>/paginas/resenhados">Resenhados</a></li>
            <li><a href="<?= URL ?>/paginas/config">Perfil</a></li>
        </ul>
    </nav>
    <script src="<?= URL ?>/public/js/mobile-navbar.js"></script>
</header>