<?php
namespace controller;

use service\AluguelService;
use view\AluguelView;

class AluguelController{

    public function listarAlugueis(){
        $aluguelServ = new AluguelService();
        $retorno = $aluguelServ->listaAlugueis();
        $aluguelView = new AluguelView();
        $aluguelView->listaAlugueis($retorno);
    }

    public function alterarAluguel(){
        $aluguelServ = new AluguelService();
        $retorno = $aluguelServ->buscarDados();
        $aluguelView = new AluguelView();
        $aluguelView->alterarAluguel($retorno);
    }

    public function salvarAlterarAluguel(){
        $aluguelServ = new AluguelService();
        $aluguelServ->salvarAlterar();
        $this->listarAlugueis();
    }

    public function criarAluguel(){
        $aluguelView = new AluguelView();
        $aluguelView->criarAluguel();
    }

    public function salvarCriarAluguel(){
        $aluguelServ = new AluguelService();
        $aluguelServ->salvarCriar();
        $this->listarAlugueis();
    }

    public function deletarAluguel(){
        $aluguelServ = new AluguelService();
        $aluguelServ->deletarAluguel();
        $this->listarAlugueis();
    }
}
?>
