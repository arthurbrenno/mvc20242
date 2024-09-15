<?php
namespace dao\mysql;

use dao\interface\IAluguelDAO;
use generic\MysqlFactory;

class AluguelDAO extends MysqlFactory implements IAluguelDAO{

    public function listar(){
        $sql = "SELECT alugueis.*, clientes.nome AS cliente_nome, veiculos.modelo AS veiculo_modelo 
                FROM alugueis 
                JOIN clientes ON alugueis.cliente_id = clientes.id 
                JOIN veiculos ON alugueis.veiculo_id = veiculos.id";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }

    public function alterar($id, $dados){
        $sql = "UPDATE alugueis SET 
                    cliente_id=:cliente_id, 
                    veiculo_id=:veiculo_id, 
                    data_inicio=:data_inicio, 
                    data_fim=:data_fim, 
                    preco_total=:preco_total, 
                    status=:status 
                WHERE id=:id";
        $param = array_merge(["id" => $id], $dados);
        $this->banco->executar($sql, $param);
    }

    public function dados($id){
        $sql = "SELECT * FROM alugueis WHERE id=:id";
        $param = ["id" => $id];
        return $this->banco->executar($sql, $param);
    }

    public function criar($dados){
        $sql = "INSERT INTO alugueis (cliente_id, veiculo_id, data_inicio, data_fim, preco_total, status) 
                VALUES (:cliente_id, :veiculo_id, :data_inicio, :data_fim, :preco_total, :status)";
        $this->banco->executar($sql, $dados);
    }

    public function deletar($id){
        $sql = "DELETE FROM alugueis WHERE id=:id";
        $param = ["id" => $id];
        $this->banco->executar($sql, $param);
    }
}
?>
