$(function() {
  //Máscaras
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
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //Mostrar a senha quando o mouse estiver sobre o ícone
  var botao = $('#mostrar');
  var senha = $('#senhaEsc');
  botao.mouseover(function() {
    senha.attr("type", "text");
  });
  botao.mouseout(function() {
    senha.attr("type", "password");
  });
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //Pegar o endereço de acordo com o CEP
  $("#cepEsc").blur(function() {
    var cep = $(this).val().replace(/\D/g, '');

    if (cep != "") {
      var validacep = /^[0-9]{8}$/;

      if(validacep.test(cep)) {
        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
          if (!("erro" in dados)) {
            $("#logradouroEsc").val(dados.logradouro);
            $("#bairroEsc").val(dados.bairro);
            $("#cidadeEsc").val(dados.localidade);
            $("#ufEsc").val(dados.uf);
          } else {
            alert("CEP não encontrado. Preencha os campos manualmente.");
          }
        });
      } else {
        alert("Formato de CEP inválido. Por favor, tente novamente.");
      }
    }
  });
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //validar CNPJ
  function validarCNPJ(cnpj) {
    cnpj = cnpj.replace(/[^\d]+/g,'');

    if(cnpj == '') {return false;}

    if (cnpj.length != 14) {return false;}

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999")
        {return false;}

    // Valida DVs
    tamanho = cnpj.length - 2;
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
          {pos = 9;}
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        {return false;}

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
          {pos = 9;}
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          {return false;}

    return true;
  }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //validar telefone
  function telefone_validation(telefone){
    telefone = telefone.replace(/\D/g,'');

    if(!(telefone.length >= 10 && telefone.length <= 11)) {
      return false;
    }
    else if (telefone.length == 11 && parseInt(telefone.substring(2, 3)) != 9) {
      return false;
    } else {
      return true;
    }

    //verifica se não é nenhum numero digitado errado (propositalmente)
    for(var n = 0; n < 10; n++){
      //um for de 0 a 9.
      //estou utilizando o metodo Array(q+1).join(n) onde "q" é a quantidade e n é o
      //caractere a ser repetido
      if(telefone == new Array(11).join(n) || telefone == new Array(12).join(n))
      {  return false;
      } else {
        return true;
      }
    }
      //DDDs validos
      var codigosDDD = [11, 12, 13, 14, 15, 16, 17, 18, 19, 21, 22, 24, 27, 28, 31, 32, 33, 34, 35, 37, 38, 41, 42, 43, 44, 45, 46, 47, 48, 49, 51, 53,
    54, 55, 61, 62,    64, 63, 65, 66, 67, 68, 69, 71, 73, 74, 75, 77, 79, 81, 82, 83, 84, 85,
    86, 87, 88, 89, 91, 92, 93, 94, 95, 96, 97, 98, 99];
      //verifica se o DDD é valido
      if(codigosDDD.indexOf(parseInt(telefone.substring(0, 2))) == -1) {
        return false;
      } else if (telefone.length == 10 && [2, 3, 4, 5, 7].indexOf(parseInt(telefone.substring(2, 3))) == -1) {
        return false;
      } else {
        return true;
      }
  }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //Quando sai do campo CNPJ aplica a validação
  $('#cnpjEsc').blur(function() {
    var c = $('#cnpjEsc').val();
    if (!(c=="")) {
      if (!validarCNPJ(c)) {
        $('#cnpjEsc').val("");
        $('#cnpj-feedback').show();
      } else {
        $('#cnpj-feedback').hide();
      }
    }
  });
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //Quando sai do campo Telefone aplica a validação
  $('#telEsc').blur(function() {
    //alert($('#telEsc').val());
    var tel = $('#telEsc').val();
    if (!(tel=="")) {
      if (!telefone_validation(tel)) {
        $('#telEsc').val("");
        $('#tel-feedback').show();
      } else {
        $('#tel-feedback').hide();
      }
    }
  });
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
});
