<?php
namespace service;

use dao\mysql\ClienteDAO;

class ClienteService extends ClienteDAO{
    public function listaClientes(){
        return parent::listar();
    }
    public function buscarDados(){
        if(isset($_GET["id"])){
            $linha = parent::dados($_GET["id"]);
            if($linha){
                return $linha[0];
            }
        }
        return false;   
    }

    public function salvarAlterar(){
        if(isset($_POST["id"])){
            $this->alterarCliente($_POST["id"],$_POST["nome"]);
        }
    }

    private function alterarCliente($id,$nome){
        parent::alterar($id,$nome);
    }

    public function salvarCriar(){
        if(isset($_POST["nome"])){
            $this->criarCliente($_POST["nome"]);
        }
    }

    private function criarCliente($nome){
        parent::criar($nome);
    }

    public function deletarCliente(){
        if(isset($_GET["id"])){
            parent::deletar($_GET["id"]);
        }
    }
}
?>
