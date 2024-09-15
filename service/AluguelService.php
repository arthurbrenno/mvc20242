<?php
namespace service;

use dao\mysql\AluguelDAO;

class AluguelService extends AluguelDAO{

    public function listaAlugueis(){
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
            $this->alterarAluguel($_POST["id"], $_POST);
        }
    }

    private function alterarAluguel($id, $dados){
        parent::alterar($id, $dados);
    }

    public function salvarCriar(){
        if($_POST){
            $this->criarAluguel($_POST);
        }
    }

    private function criarAluguel($dados){
        parent::criar($dados);
    }

    public function deletarAluguel(){
        if(isset($_GET["id"])){
            parent::deletar($_GET["id"]);
        }
    }
}
?>
