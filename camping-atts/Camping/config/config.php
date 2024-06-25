<?php
/*Try para informar ao usuário quando ocorrer um erro na conexão do banco de dados*/
try{
/*Conexão    Parâmetros PDO, sgbd usado, host, nome do bd, usuario, senha*/
$conexao = new PDO('mysql:host=localhost;dbname=camping', 'root', 'senac');
/*Atributo especificador de excessão */
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* Comando para atestar se tá interagindo com o bd */
$result = $conexao->query("Select * From products")->fetchAll();
} catch(PDOexception $erro){
    echo "ERRO =>" .  $erro->getMessage();
}





?>