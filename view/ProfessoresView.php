<?php

namespace view;

use generic\View;
use template\UsuarioTemp;

class ProfessoresView extends View
{
    public function __construct()
    {
        parent::__construct(new UsuarioTemp());
    }
    public function listaProfessores()
    {
        
        $this->conteudo("public/ListaProfessores.php");
    }
}
