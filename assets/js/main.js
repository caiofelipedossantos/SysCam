$(document).ready(function(){
    $('#formlogin').submit(function(){ 	//Ao submeter formulário
        var url = "actions/login.php"; //Caminho do arquivo php
        var formDados = new FormData($(this)[0]); //Pega os valores dos campos
        $.ajax({    //Função AJAX
            type: "POST", //Tipo da passagem dos dados
            url: url, // local do arquivo php
            dataType: 'html', //tipo de dados a serem passados
            data: formDados, // dados do formulario
            cache: false, //cache
            contentType: false,
            processData: false,
            beforeSend: function () {
                var alertBox = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>AGUARDE</strong> estamos analizando seus dados!</div>';
                $('#result').html(alertBox);
            },
            complete: function () {},
            success: function (data)
            {
                $('#result').html(data);

            }
        });
        return false;	//Evita que a página seja atualizada
    });
});