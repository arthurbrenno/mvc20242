<?php
namespace dao\interface;
interface IClienteDAO{
    public function listar();
    public function alterar($id,$nome);
    public function dados($id);
}