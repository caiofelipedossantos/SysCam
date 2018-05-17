<?php
session_start();
if(isset($_SESSION['dados']) && !empty($_SESSION['dados'])){
    
        if($_SESSION['dados']['tipo'] == 0){
            header("Location: index.php");
        }else{
            header("Location: usuario.php");
        }
    
}else{
    /** Chamada do template de Cabeçario */
    include_once 'parts/header.php';
?>
    <form id="formlogin" class="form-login text-center" method="POST">
        <img class="mb-4" src="assets/images/logo.png" alt="" width="100%" height="80">
        <div id="result" class="mb-4"></div>
        <label for="inputUser" class="sr-only">Nome</label>
        <input type="text" id="inputUser" name="login" class="form-control" placeholder="Nome" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
<?php
    /** Chamada do template de Rodapé */
    include_once 'parts/footer.php';
}
?>