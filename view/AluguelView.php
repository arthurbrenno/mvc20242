<?php

namespace view;

use generic\View;
use template\UsuarioTemp;

class AluguelView extends View
{
    public function __construct()
    {
        parent::__construct(new UsuarioTemp());
    }
    public function listaAlugueis($dados)
    {
        $this->conteudo("public/ListaAluguel.php", $dados);
    }

    public function alterarAluguel($dados)
    {
        $this->conteudo("public/AlterarAluguel.php", $dados);
    }

    public function criarAluguel()
    {
        $this->conteudo("public/CriarAluguel.php");
    }
}
?>
