<?php 
    /** Chamada do template de Cabeçario */
    include_once 'parts/header.php';
?>
    <form class="form-login text-center">
        <img class="mb-4" src="assets/images/logo.png" alt="" width="100%" height="80">
        <div class="result mb-4"></div>
        <label for="inputEmail" class="sr-only">E-mail</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
<?php
    /** Chamada do template de Rodapé */
    include_once 'parts/footer.php';
?>