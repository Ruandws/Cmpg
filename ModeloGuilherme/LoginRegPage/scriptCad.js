document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        hideLoadingScreen();
    }, 2000);
  });
  
  function hideLoadingScreen() {
    document.getElementById('loadingScreen').style.display = 'none';
  }


  //MÁSCARA

document.getElementById('nome').addEventListener('input', function (e) {
  var value = e.target.value;
  value = value.replace(/[^a-zA-Z\s]/g, ''); // Remove qualquer coisa que não seja letra ou espaço

  e.target.value = value;
});


document.getElementById('cpf').addEventListener('input', function (e) {
  var value = e.target.value;
  value = value.replace(/\D/g, ''); // Remove qualquer coisa que não seja número
  value = value.substring(0, 11); // Limita o valor a 10 dígitos
  value = value.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o primeiro ponto
  value = value.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o segundo ponto
  value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona o traço

  e.target.value = value;
});