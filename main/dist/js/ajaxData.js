$(document).ready(function() {
  // MODAL COM OS DETALHES DA ESCOLA
  $(document).on('click', '#getDetalhes', function(e) {
    e.preventDefault();
    var empid = $(this).data('id');
    $('#detalhes-escola').hide();
    $('#escola_data-loader').show();
    $.ajax({
        url: 'escData.php',
        type: 'POST',
        data: 'empid=' + empid,
        dataType: 'json',
        cache: false
      })
      .done(function(data) {
        $('#detalhes-escola').hide();
        $('#detalhes-escola').show();
        if (!(data.sigla_escolas == "")) {
          $('#nome').html(data.nome_escolas + " - " + data.sigla_escolas);
        } else {
          $('#nome').html(data.nome_escolas);
        }
        $('#cnpj').html(data.cnpj_escolas);
        $('#end').html(data.cep_escolas + "<br>" + data.rua_escolas + ", " + data.num_escolas + "<br>" + data.bairro_escolas + ", " + data.cidade_escolas + " - " + data.uf_escolas);
        $('#tel').html(data.telefone_escolas);
        $('#email').html(data.email_escolas);
        $('#cad').html(ajeitarData(data.data_cadastro));
        $('#escola_data-loader').hide();
      })
      .fail(function() {
        $('#detalhes-escola').html('Erro, por favor tente novamente...');
        $('#escola_data-loader').hide();
      });
  });

  // COLOCAR DATA NO FORMATO 22/22/2222
  function ajeitarData(d) {
    var data = d.substring(8, 10) + "/" + d.substring(5, 7) + "/" + d.substring(0, 4);
    return data;
  }

  var id;
  //CARREGAR MODAL PRA EDITAR COM AS INFORMACOES
  $(document).on('click', '#getEditar', function(ev) {
    ev.preventDefault();
    var empid = $(this).data('idi');
    id = empid;
    $('#editar-escola').hide();
    $('#editar_data-loader').show();
    $.ajax({
        url: 'escData.php',
        type: 'POST',
        data: 'empid=' + empid,
        dataType: 'json',
        cache: false
      })
      .done(function(data) {
        $('#editar-escola').hide();
        $('#editar-escola').show();

        $('#id').val(data.cod_escolas);
        $('#siglaEsc').val(data.sigla_escolas);
        $('#nomeEsc').val(data.nome_escolas);
        $('#cnpjEsc').val(data.cnpj_escolas);
        $('#cepEsc').val(data.cep_escolas);
        $('#numeroEsc').val(data.num_escolas);
        $('#logradouroEsc').val(data.rua_escolas);
        $('#bairroEsc').val(data.bairro_escolas);
        $('#cidadeEsc').val(data.cidade_escolas);
        $('#ufEsc').val(data.uf_escolas);
        $('#telEsc').val(data.telefone_escolas);
        $('#emailEsc').val(data.email_escolas);
        $('#editar_data-loader').hide();
      })
      .fail(function() {
        $('#editar-escola').html('Erro, por favor tente novamente...');
        $('#editar_data-loader').hide();
      });
  });

  function verCamposRequeridos() {
    if ($('#nomeEsc').val() == "" ||
      $('#cnpjEsc').val() == "" ||
      $('#cepEsc').val() == "" ||
      $('#logradouroEsc').val() == "" ||
      $('#bairroEsc').val() == "" ||
      $('#cidadeEsc').val() == "" ||
      $('#ufEsc').val() == "" ||
      $('#telEsc').val() == "" ||
      $('#emailEsc').val() == ""
    ) {
      return false;
    } else {
      return true;
    }
  }

  // SUBMETER A EDICAO FEITA
  $(document).on('click', '#submit', function(eve) {
    eve.preventDefault();

    if (id > 0 && verCamposRequeridos()) {
      $.ajax({
        url: '../model/updateEsc.php',
        type: 'POST',
        data: $('form').serialize(),
        success: function() {
          $("#editar").modal('hide');
          recarregarTabela();
          new PNotify({
            text: 'Escola editada com sucesso.',
            type: 'success',
            styling: 'bootstrap3'
          });
        },
        error: function() {
          new PNotify({
            text: 'Não foi possível editar escola, tente novamente.',
            type: 'error',
            styling: 'bootstrap3'
          });
        }
      });
      id = 0;

    } else {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
        if (form.checkValidity() === false) {
          eve.stopPropagation();
          $('#user-feedback').html("Informe um nome de usuário válido.");
          $('#cnpj-feedback').html("Informe um CNPJ válido.");
          $('#senha-feedback').html("Informe uma senha válida.");
          $('#senha-feedback').show();
        }
        form.classList.add('was-validated');
      });
    }
  });

  // EXCLUIR
  $(document).on('click', '#getExcluir', function(eve) {
    eve.preventDefault();
    var id = $(this).data('id');
    swal({
        title: "Deletar escola?",
        text: "Colocar checkbox com opcao de excluir os alunos da escola",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: '../model/deleteEsc.php',
            type: 'POST',
            data: 'id=' + id,
            success: function() {
              recarregarTabela();
              new PNotify({
                text: 'Escola excluída com sucesso.',
                type: 'success',
                styling: 'bootstrap3'
              });

            },
            error: function() {
              new PNotify({
                text: 'Não foi possível excluir escola, tente novamente.',
                type: 'error',
                styling: 'bootstrap3'
              });
            }
          });
        }
      });
  });

  // RECARREGAR A TABELA
  function recarregarTabela() {
    $.ajax({
        url: 'tables-escola.php',
        type: 'POST',
        dataType: 'html',
        cache: false
      })
      .done(function(table) {
        $('#tabela').html(table);
      });
  }

});
