// carrossel

$(document).ready(function () {
    $('.custom-carousel-control').click(function () {
      if ($(this).hasClass('carousel-control-prev')) {
        $('#carouselExampleIndicators').carousel('prev');
      } else {
        $('#carouselExampleIndicators').carousel('next');
      }
    });
  });


//OFF CANVAS

const openMenuBtn = document.getElementById('openMenuBtn');
const closeMenuBtn = document.getElementById('closeMenuBtn');
const menu = document.getElementById('menu');
const overlay = document.getElementById('overlay');


openMenuBtn.addEventListener('click', () => {
  menu.classList.add('open');
});

closeMenuBtn.addEventListener('click', () => {
  menu.classList.remove('open');
});
overlay.addEventListener('click', () => {
  menu.classList.remove('open');
});




//LOADING
document.addEventListener('DOMContentLoaded', function () {
  setTimeout(function () {
      hideLoadingScreen();
  }, 2000);
});

function hideLoadingScreen() {
  document.getElementById('loadingScreen').style.display = 'none';
}





//POPUP
document.getElementById("forgotPasswordLink").addEventListener("click", function(event) {
  event.preventDefault();
  document.getElementById("popup").style.display = "block";
});

document.getElementById("closePopup").addEventListener("click", function() {
  document.getElementById("popup").style.display = "none";
});

document.getElementById("overlay").addEventListener("click", function() {
  document.getElementById("popup").style.display = "none";
});



