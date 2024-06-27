<?php

class PessoaModel
{
    public  $id, $nome, $cpf, $data_nascimento;
    public  $rows;

    //Vai puxar todos os dados do Banco de dados, pela camada DAO
    public function save()
    {
        include 'DAO/PessoaDAO.php';

        $dao = new PessoaDAO();



        if(empty($this->id))
        {
            $dao->insert($this);
        }else{

            $dao->uptdate($this);
        }

    }
    //função para pegar todas as linhas da tabela pessoa
    public function getAllRows()
    {
        include 'DAO/PessoaDAO.php';
        $dao = new PessoaDAO();

        $this->rows = $dao->select();

    }

    public function getById(int $id)
    {
        include 'DAO/PessoaDAO.php';

        $dao = new PessoaDAO();
  
        $obj = $dao->selectById($id);

        //Operador ternário: então retorne ele mesmo, se não um novo objeto.
        return ($obj) ? $obj : new PessoaModel();

        
    }
}