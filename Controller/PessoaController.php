<?php
//Cada um dos métodos, através das rotas do index.php
class PessoaController
{
        public static function index()
        {   
            include 'Model/PessoaModel.php';

            $model = new PessoaModel();
            $model->getAllRows();
            

            include 'View/modules/Pessoa/ListaPessoa.php';

            //Instanciando o Objeto
            $model = new PessoaModel();
        }
    
        public static function form()
        {
            include 'Model/PessoaModel.php';
            $model = new PessoaModel();

            if(isset($_GET['id']))
            //Linha de proteção contra SQL Injection
            $model =$model->getById((int) $_GET['id']);

           // var_dump($model);
 
            include 'View/modules/Pessoa/FormPessoa.php';
        }

        public static function save()
        {
            // é quem transporta os dados fornecidos pelo usuário no formulário(view) para a DAO - q é responsável pela conexão E inserção de dados no banco.
            
            include 'Model/PessoaModel.php';

    

            //Instanciando o Objeto
            $model = new PessoaModel();

            //Propriedades do Objeto de acordo com as informações do formulário, para puxar os dados.
            $model->id = $_POST['id'];
            $model->nome = $_POST['nome'];
            $model->cpf = $_POST['cpf'];
            $model->data_nascimento = $_POST['data_nascimento'];

            exit;

            //Método save que insere os dados do form no banco.
            $model->save();

            header('Location: /pessoa');


        }
}