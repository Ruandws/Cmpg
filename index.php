<?php
//Inclusão para poder usar a classe de um outro arquivo
include 'Controller/PessoaController.php';



//Detecta o PATH(rota) que o usuário quer acessar 
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//Encaixe do que aparece em cada rota pesquisada pelo usuário 
switch($url)
{
    case '/': 
        echo "Página Inicial";
    break;

    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/form/save':
        PessoaController::save();
    break;
        
    default:
        echo "ERRO 404";
    break;
}