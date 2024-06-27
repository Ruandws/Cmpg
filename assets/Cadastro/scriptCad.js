document.addEventListener('DOMContentLoaded', function () {
  showLoadingScreen();
  setTimeout(function () {
      hideLoadingScreen();
  }, 2000);
});

function hideLoadingScreen() {
  document.getElementById('loadingScreen').style.display = 'none';
  document.body.classList.remove('no-scroll');
}

function showLoadingScreen() {
  document.getElementById('loadingScreen').style.display = 'flex';
  document.body.classList.add('no-scroll');
  window.scrollTo(0, 0);
}



  //MÁSCARA

document.getElementById('nome').addEventListener('input', function (e) {
  var value = e.target.value;
  value = value.replace(/[^a-zA-Z\s]/g, ''); 

  e.target.value = value;
});


document.getElementById('cpf').addEventListener('input', function (e) {
  var value = e.target.value;
  value = value.replace(/\D/g, ''); 
  value = value.substring(0, 11); 
  value = value.replace(/(\d{3})(\d)/, '$1.$2'); 
  value = value.replace(/(\d{3})(\d)/, '$1.$2'); 
  value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); 

  e.target.value = value;
});