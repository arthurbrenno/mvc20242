<?php
namespace controller;

use service\VeiculoService;
use view\VeiculoView;

class VeiculoController{

    public function listarVeiculos(){
        $veiculoServ = new VeiculoService();
        $retorno = $veiculoServ->listaVeiculos();
        $veiculoView = new VeiculoView();
        $veiculoView->listaVeiculos($retorno);
    }

    public function alterarVeiculo(){
        $veiculoServ = new VeiculoService();
        $retorno = $veiculoServ->buscarDados();
        $veiculoView = new VeiculoView();
        $veiculoView->alterarVeiculos($retorno);
    }

    public function salvarAlterarVeiculo(){
        $veiculoServ = new VeiculoService();
        $veiculoServ->salvarAlterar();
        $this->listarVeiculos();
    }

    public function criarVeiculo(){
        $veiculoView = new VeiculoView();
        $veiculoView->criarVeiculo();
    }

    public function salvarCriarVeiculo(){
        $veiculoServ = new VeiculoService();
        $veiculoServ->salvarCriar();
        $this->listarVeiculos();
    }

    public function deletarVeiculo(){
        $veiculoServ = new VeiculoService();
        $veiculoServ->deletarVeiculo();
        $this->listarVeiculos();
    }
}
?>
