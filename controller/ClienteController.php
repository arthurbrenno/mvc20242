<?php
namespace controller;

use service\ClienteService;
use view\ClienteView;

class ClienteController{

    public function listarClientes(){
        $clienteServ = new ClienteService();
        $retorno = $clienteServ->listaClientes();
        $clienteView = new ClienteView();
        $clienteView->listaClientes($retorno);
    }

    public function alterarCliente(){
        $clienteServ = new ClienteService();
        
        $retorno=$clienteServ->buscarDados();
        
        $clienteView = new ClienteView();
        $clienteView->alterarClientes($retorno);
    }

    public function salvarAlterarCliente(){
        $clienteServ = new ClienteService();
        $clienteServ->salvarAlterar();
        $this->listarClientes();
    }
}
?>