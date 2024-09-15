<?php
namespace dao\interface;
interface IVeiculoDAO{
    public function listar();
    public function alterar($id, $dados);
    public function dados($id);
    public function criar($dados);
    public function deletar($id);
}
?>
