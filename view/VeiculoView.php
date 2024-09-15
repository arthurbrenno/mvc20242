<?php

namespace view;

use generic\View;
use template\UsuarioTemp;

class VeiculoView extends View
{
    public function __construct()
    {
        parent::__construct(new UsuarioTemp());
    }
    public function listaVeiculos($dados)
    {
        $this->conteudo("public/ListaVeiculo.php",$dados);
    }

    public function alterarVeiculos($dados)
    {
        $this->conteudo("public/AlterarVeiculo.php",$dados);
    }

    public function criarVeiculo()
    {
        $this->conteudo("public/CriarVeiculo.php");
    }
}
?>
