$(document).ready(function () {
    $('#formlogin').submit(function () { 	//Ao submeter formulário
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
            complete: function () { },
            success: function (data) {
                $('#result').html(data);
            }
        });
        return false;	//Evita que a página seja atualizada
    });


    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    $('#cameraLive').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var nome = button.data('nome')
        var alias = button.data('alias') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text(nome)
        modal.find('.modal-body').html('<iframe src="http://g1.ipcamlive.com/player/player.php?alias='+ alias +'&autoplay=1&disablefullscreen=0" width="100%" height="450px" frameborder="0" allowfullscreen></iframe>');
      })
});