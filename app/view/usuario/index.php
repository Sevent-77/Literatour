<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL ?>/public/css/style2.css" type="text/css">
<div class="container_login" id="container">
    <div class="form-container sign-up-container">
        <form action="<?= URL ?>/usuarios/cadastrar" method="post">
            <h1>Crie sua conta</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>Ou use seu e-mail já registrado</span>
            <input type="text" placeholder="Nome" value="<?= $dados['nome'] ?>"
                class="form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>" name="nome">
            <div class="invalid-feedback">
                <?= $dados['nome_erro'] ?>
            </div>
            <input type="email" placeholder="Email"
                pattern="^[a-zA-Z0-9_\.- ] +(\.[a-zA -Z0-9_\.-]+)*@[a-zA-Z0-9_\.-]+$" <?= $dados['email'] ?>"
                class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>" name="email">
            <div class="invalid-feedback">
                <?= $dados['email_erro'] ?>
            </div>
            <input type="password" placeholder="Senha" value="<?= $dados['senha'] ?>"
                class="form-control  <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>" name="senha">
            <div class="invalid-feedback">
                <?= $dados['senha_erro'] ?>
            </div>
            <button class="sec" id="right">Cadastro</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="<?= URL ?>/usuarios/login" method="post">
            <h1>Login</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="https://accounts.google.com/gsi/button?click_listener=async()%3D%3E%7Bconst%7Bdispatch%3Ae%2CmodalOptions%3A%7BallowLanguagelessUser%3At%2CisSignIn%3As%2ClimitRedirect%3Aa%2CredirectPath%3An%3Dr.B6%2CtrackingProps%3Ao%2Cvia%3Al%7D%2Chistory%3Ac%7D%3Dthis.props%3Bthis.setState(%7Berrors%3A%7B%7D%2Csubmitting%3A!1%7D)%3Btry%7B(0%2Ci.j)(s%3F%22sign_in_tap%22%3A%22registration_tap%22%2CObject.assign(%7Btarget%3A%22google%22%2Cvia%3Al%7D%2Co))%3Bconst%20r%3Dawait(0%2CCe.F)(%7BallowLanguagelessUser%3At%2Cdispatch%3Ae%2Chistory%3Ac%2ConLoginSuccess%3Athis.handleLoginSuccess%2CredirectPath%3An%2CsetSubmitting%3A()%3D%3Ethis.setState(%7Bsubmitting%3A%22google%22%7D)%2Cvia%3Al%7D)%3Bthis.handleGeneralSuccess(r%2Ca)%7Dcatch(e)%7Bthis.setState(%7Berrors%3A%7Bsocial%3A(0%2Cie.H8)(19737)%7D%2Csubmitting%3A!1%2CuseImprovedErrorMessages%3A!0%7D)%2Cs%7C%7Cthis.handleRegisterFailure(%22google%22)%7D%7D&width=176&client_id=450298686065.apps.googleusercontent.com&iframe_id=gsi_605135_707538&as=lBxR%2BW%2BSfiQ5VFu8sh9yRA"
                    class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>Ou use sua conta...</span>
            <input type="email" placeholder="Email" name="email" id="email" value="<?= $dados['email'] ?>"
                class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
                <?= $dados['email_erro'] ?>
            </div>
            <input type="password" placeholder="Senha" name="senha" id="senha" value="<?= $dados['senha'] ?>"
                class="form-control  <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
                <?= $dados['senha_erro'] ?>
            </div>
            <a href="#">Esqueceu sua senha?</a>
            <button class="first" id="left">Entrar</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Bem vindo de volta!</h1>
                <p>Para se manter conectado conosco, faça o login com suas informações pessoais</p>
                <button class="ghost" id="signIn">Entrar</button>
            </div>
            <div class="overlay-panel overlay-right">
                <a class="logo" href="<?= URL ?>"> <u>
                        <H1> LITERATOUR</H1>
                    </u>
                </a>
                <p>Insira os seus dados pessoais e começe a viajar connosco</p>
                <button class="ghost" id="signUp">Criar conta</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= URL ?>/public/js/main.js"></script>
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