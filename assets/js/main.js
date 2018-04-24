$(document).ready(function () {
    /*
        ACTION LOGIN
    */
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

    /*
        ACTION ADD CÂMERA
    */
    $('#formAddCamera').submit(function () { 	//Ao submeter formulário
        var url = "actions/addCamera.php"; //Caminho do arquivo php
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
                $("#camListView").load(location.href + " #camListView>*", "");
            }
        });
        return false;	//Evita que a página seja atualizada
    });

    /* ACTION EDIT CAMERA */
    $('#formEditCamera').submit(function () { 	//Ao submeter formulário
        var url = "actions/editCamera.php"; //Caminho do arquivo php
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
                $('#resultEditCam').html(alertBox);
            },
            complete: function () { },
            success: function (data) {
                $('#resultEditCam').html(data);
                $("#camListView").load(location.href + " #camListView>*", "");
            }
        });
        return false;	//Evita que a página seja atualizada
    });

    /* ADD USUARIO */
    $('#formAddUsuario').submit(function () { 	//Ao submeter formulário
        var url = "actions/addUsuario.php"; //Caminho do arquivo php
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
                $('#resultAddUser').html(alertBox);
            },
            complete: function () { },
            success: function (data) {
                $('#resultAddUser').html(data);
                $("#userListView").load(location.href + " #userListView>*", "");
            }
        });
        return false;	//Evita que a página seja atualizada
    });

    /***********
     * ADD ACESSO
     */
    $('#formAddAcesso').submit(function () { 	//Ao submeter formulário
        var url = "actions/addAcesso.php"; //Caminho do arquivo php
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
                $('#resultAddAcesso').html(alertBox);
            },
            complete: function () { },
            success: function (data) {
                $('#resultAddAcesso').html(data);
                $("#accessListView").load(location.href + " #accessListView>*", "");
            }
        });
        return false;	//Evita que a página seja atualizada
    });

    $('#removeAcesso').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var idUser = button.data('idacessoremoveuser');
        var idCam = button.data('idacessoremovecam');
        var modal = $(this);
        modal.find('.modal-title').text('Remover Câmera ' + idCam);
        $('#idUserRemoveAcess').val(idUser);
        $('#idCamRemoveAcess').val(idCam);
    });

    $('#formRemoveAcess').submit(function () { 	//Ao submeter formulário
        var url = "actions/removeAcesso.php"; //Caminho do arquivo php
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
                $('#resultRemoveAcess').html(alertBox);
            },
            complete: function () { },
            success: function (data) {
                $('#resultRemoveAcess').html(data);
                $("#accessListView").load(location.href + " #accessListView>*", "");
            }
        });
        return false;	//Evita que a página seja atualizada
    });



    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    /*
        MODAL VIEW CAMERA
    */
    $('#cameraLive').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var nome = button.data('nome')
        var alias = button.data('alias') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text(nome)
        modal.find('.modal-body').html('<iframe src="http://g1.ipcamlive.com/player/player.php?alias=' + alias + '&autoplay=1&disablefullscreen=0" width="100%" height="450px" frameborder="0" allowfullscreen></iframe>');
    });

    /*
      BUTTON ADD CAMERA
    */
    $('#addCameraButton').click(function () {
        var json = "https://ipcamlive.com/api/v2/getcameras?apisecret=5ac0a4b1543f4";
        var out = new XMLHttpRequest();
        var select = $("#camDiponivel");
        var cams;
        $(select).children('option:not(:first)').remove();
        out.open('GET', json);
        out.onload = function () {
            var data = JSON.parse(out.responseText);
            cams = data.data.cameras;
            for (i = 0; i < cams.length; i++) {
                select.append($("<option></option>").val(cams[i].alias).text(cams[i].alias));
            }
        };
        out.send();
        (select).change(function () {
            for (i = 0; i < cams.length; i++) {
                if ($(this).val() == cams[i].alias) {
                    $('#camAlias').val(cams[i].alias);
                    $('#camEndereco').val(cams[i].url);
                    $('#screenshot').val("http://g1.ipcamlive.com/player/snapshot.php?alias=" + cams[i].alias);
                }
            }
        });
    });

    //MODAL EDIT CAMERA
    $('#editCamera').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nome = button.data('nome');
        var status = button.data('status');
        var modal = $(this);
        modal.find('.modal-title').text("Editar: " + nome);
        $('#editCamId').val(id);
        $('#editCamNome').val(nome);
        $('#editCamStatus').val(status);
    });

    $('#delCamera').click(function(){
        var url = "actions/delCamera.php"; //Caminho do arquivo php
        var formDados = $('#editCamId').val; //Pega os valores dos campos
        $.ajax({    //Função AJAX
            type: "POST", //Tipo da passagem dos dados
            url: url, // local do arquivo php
            data: {'editCamId':formDados}, // dados do formulario
            cache: false, //cache
            contentType: false,
            processData: false,
            beforeSend: function () {
                var alertBox = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>AGUARDE</strong> estamos analizando seus dados!</div>';
                $('#resultEditCam').html(alertBox);
            },
            complete: function () { },
            success: function (data) {
                $('#resultEditCam').html(data);
                $("#camListView").load(location.href + " #camListView>*", "");
            }
        });
        return false;
    });
    

    /***********************
        USUARIO 
    ************************/

    //MODAL USUARIO
    $('#editUsuario').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nome = button.data('nome');
        var senha = button.data('senha');
        var status = button.data('status');
        var email = button.data('email');
        var modal = $(this);
        modal.find('.modal-title').text("Editar: " + nome);
        $('#idUsuario').val(id);
        $('#nomeUsuario').val(nome);
        $('#statusUsuario').val(status);
        $('#emailUsuario').val(email);
    });

    //EDIT
    $('#formeditUsuario').submit(function () { 	//Ao submeter formulário
        var url = "actions/editUsuario.php"; //Caminho do arquivo php
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
                $('#resultEditUser').html(alertBox);
            },
            complete: function () { },
            success: function (data) {
                $('#resultEditUser').html(data);
                $("#userListView").load(location.href + " #userListView>*", "");
            }
        });
        return false;	//Evita que a página seja atualizada
    });

    /*
        TABS
    */

    $("#tabs").tabs();

    /* TOOLTIP */
    $('[data-toggle="tooltip"]').tooltip();
   
});