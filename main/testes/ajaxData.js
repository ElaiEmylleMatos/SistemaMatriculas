$(document).ready(function() {
  $(document).on('click', '#getDetalhes', function(e) {
    e.preventDefault();
    var empid = $(this).data('id');
    $('#detalhes-escola').hide();
    $('#escola_data-loader').show();
    $.ajax({
     url: 'escData.php',
     type: 'POST',
     data: 'empid='+empid,
     dataType: 'json',
     cache: false
    })
    .done(function(data){
     $('#detalhes-escola').hide();
     $('#detalhes-escola').show();
     if (!(data.sigla_escolas=="")) {
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
    .fail(function(){
     $('#detalhes-escola').html('Erro, Please try again... Jaehyunie');
     $('#escola_data-loader').hide();
    });
  });

  function ajeitarData(d) {
    var data = d.substring(8,10) + "/" + d.substring(5,7) + "/" + d.substring(0,4);
    return data;
  }

  var id;
  $(document).on('click', '#getEditar', function(ev) {
    ev.preventDefault();
    var empid = $(this).data('idi');
    id = empid;
    $('#editar-escola').hide();
    $('#editar_data-loader').show();
    $.ajax({
     url: 'escData.php',
     type: 'POST',
     data: 'empid='+empid,
     dataType: 'json',
     cache: false
    })
    .done(function(data){
     $('#editar-escola').hide();
     $('#editar-escola').show();

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
    .fail(function(){
     $('#editar-escola').html('Erro, Please try again... Jaehyunie');
     $('#editar_data-loader').hide();
     });
  });

  /*$(document).on('click', '#getSalvar', function(eve) {
    eve.preventDefault();
    if (!id==0) {
      $.ajax({
       url: 'updateEsc.php',
       type: 'POST',
       data: 'empid='+id,'nome='+$('#nomeEsc').val(),
       //dataType: 'json',
       cache: false
     });
    } else {
      //deu erro
    }


  });*/

});
