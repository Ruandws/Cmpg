function showSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex';
}

function closeSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none';
}


// Seleciona o link de login, a sidebar de login e a overlay
const loginLink = document.getElementById('loginLink');
const loginLink2 = document.getElementById('loginLink2');
const loginSidebar = document.getElementById('loginSidebar');
const overlay = document.createElement('div');
overlay.classList.add('overlay');
document.body.appendChild(overlay);

const closeLoginSidebarLinks = document.querySelectorAll('.closeLoginSidebar');

// Função para abrir a sidebar de login
function openLoginSidebar(event) {
  event.preventDefault();
  loginSidebar.classList.add('show');
  overlay.classList.add('active');
  document.body.classList.add('sidebar-open');
  closeSidebar(); // Fecha a sidebar principal
}

// Função para fechar a sidebar de login
function closeLoginSidebar(event) {
  event.preventDefault();
  loginSidebar.classList.remove('show');
  overlay.classList.remove('active');
  document.body.classList.remove('sidebar-open');
  // Adicione aqui a função para fechar a sidebar principal
  closeSidebar();
}

// Adiciona o evento de clique no link de login para abrir a sidebar de login
loginLink.addEventListener('click', openLoginSidebar);
loginLink2.addEventListener('click', openLoginSidebar);

// Adiciona o evento de clique nos links de fechar sidebar de login para fechar a sidebar de login
closeLoginSidebarLinks.forEach(link => {
  link.addEventListener('click', closeLoginSidebar);
});

// Fecha a sidebar de login se clicar fora dela
overlay.addEventListener('click', closeLoginSidebar);
