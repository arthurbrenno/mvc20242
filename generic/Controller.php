<?php
namespace generic;

class Controller{
   
    private $arrChamadas=[];
    
    public function __construct(){
        $this->arrChamadas = [
            // Rotas de clientes
            "cliente/lista" => new Acao("controller\ClienteController","listarClientes"),
            "cliente/alterar" => new Acao("controller\ClienteController","alterarCliente"),
            "cliente/salvarAlterar" => new Acao("controller\ClienteController","salvarAlterarCliente"),
            "cliente/criar" => new Acao("controller\ClienteController","criarCliente"),
            "cliente/salvarCriar" => new Acao("controller\ClienteController","salvarCriarCliente"),
            "cliente/deletar" => new Acao("controller\ClienteController","deletarCliente"),

            // Rotas de veículos
            "veiculo/lista" => new Acao("controller\VeiculoController","listarVeiculos"),
            "veiculo/alterar" => new Acao("controller\VeiculoController","alterarVeiculo"),
            "veiculo/salvarAlterar" => new Acao("controller\VeiculoController","salvarAlterarVeiculo"),
            "veiculo/criar" => new Acao("controller\VeiculoController","criarVeiculo"),
            "veiculo/salvarCriar" => new Acao("controller\VeiculoController","salvarCriarVeiculo"),
            "veiculo/deletar" => new Acao("controller\VeiculoController","deletarVeiculo"),

            // Rotas de aluguéis
            "aluguel/lista" => new Acao("controller\AluguelController","listarAlugueis"),
            "aluguel/alterar" => new Acao("controller\AluguelController","alterarAluguel"),
            "aluguel/salvarAlterar" => new Acao("controller\AluguelController","salvarAlterarAluguel"),
            "aluguel/criar" => new Acao("controller\AluguelController","criarAluguel"),
            "aluguel/salvarCriar" => new Acao("controller\AluguelController","salvarCriarAluguel"),
            "aluguel/deletar" => new Acao("controller\AluguelController","deletarAluguel"),
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
?>
