<?php
namespace generic;

class Controller{
   
    private $arrChamadas=[];
    
    public function __construct(){
        $this->arrChamadas = [
            "professores/lista" => new Acao("controller\ProfessorController","listarProfessores"),
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