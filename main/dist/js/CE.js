$(function() {
  $('#cnpjEsc').mask('00.000.000/0000-00', {reverse: true});
  $('#cepEsc').mask('00000-000', {reverse: true});

  var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
  };

  $('#telEsc').mask(SPMaskBehavior, spOptions);

    function limpa_formulário_cep() {
        $("#logradouroEsc").val("");
        $("#bairroEsc").val("");
        $("#cidadeEsc").val("");
        $("#ufEsc").val("");

    }

    //Quando o campo cep perde o foco.
    $("#cepEsc").blur(function() {

        var cep = $(this).val().replace(/\D/g, '');

        if (cep != "") {

            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        $("#logradouroEsc").val(dados.logradouro);
                        $("#bairroEsc").val(dados.bairro);
                        $("#cidadeEsc").val(dados.localidade);
                        $("#ufEsc").val(dados.uf);
                    } //end if.
                    else {
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            limpa_formulário_cep();
        }
    });
});
