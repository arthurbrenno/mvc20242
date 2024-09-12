<?php
namespace generic;

class Controller{
   
    private $arrChamadas=[];
    
    public function __construct(){
        $this->arrChamadas = [
            "cliente/lista" => new Acao("controller\ClienteController","listarClientes"),
            "cliente/alterar" => new Acao("controller\ClienteController","alterarCliente"),
            "cliente/salvarAlterar" => new Acao("controller\ClienteController","salvarAlterarCliente"),
        ];
    }

   
    public function verificarCaminho($rota){
        if(isset($this->arrChamadas[$rota])){
             $this->arrChamadas[$rota]->executar();
             return;
        }

            echo "Rota não existe!";
        

        
    }




}