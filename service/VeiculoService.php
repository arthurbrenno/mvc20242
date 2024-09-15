<?php
namespace service;

use dao\mysql\VeiculoDAO;

class VeiculoService extends VeiculoDAO{
    public function listaVeiculos(){
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
            $this->alterarVeiculo($_POST["id"], $_POST);
        }
    }

    private function alterarVeiculo($id,$dados){
        parent::alterar($id,$dados);
    }

    public function salvarCriar(){
        if($_POST){
            $this->criarVeiculo($_POST);
        }
    }

    private function criarVeiculo($dados){
        parent::criar($dados);
    }

    public function deletarVeiculo(){
        if(isset($_GET["id"])){
            parent::deletar($_GET["id"]);
        }
    }
}
?>
