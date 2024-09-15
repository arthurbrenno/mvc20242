<?php
namespace dao\mysql;

use dao\interface\IVeiculoDAO;
use generic\MysqlFactory;

class VeiculoDAO extends MysqlFactory implements IVeiculoDAO{

    public function listar(){
        $sql="select * from veiculos";
        $retorno= $this->banco->executar($sql);
        return $retorno;
    }

    public function alterar($id,$dados){
        $sql = "update veiculos set marca=:marca, modelo=:modelo, ano_fabricacao=:ano_fabricacao, placa=:placa, cor=:cor, categoria=:categoria, preco_diaria=:preco_diaria, status=:status, quilometragem=:quilometragem, data_aquisicao=:data_aquisicao where id=:id";
        $param = array_merge(["id" => $id], $dados);
        $this->banco->executar($sql, $param);
    }

    public function dados($id){
        $sql = "select * from veiculos where id=:id";
        $param=[
            "id" =>$id
        ];
        return $this->banco->executar($sql,$param);
    }

    public function criar($dados){
        $sql = "insert into veiculos (marca, modelo, ano_fabricacao, placa, cor, categoria, preco_diaria, status, quilometragem, data_aquisicao) values (:marca, :modelo, :ano_fabricacao, :placa, :cor, :categoria, :preco_diaria, :status, :quilometragem, :data_aquisicao)";
        $this->banco->executar($sql, $dados);
    }

    public function deletar($id){
        $sql = "delete from veiculos where id=:id";
        $param = [
            "id" => $id
        ];
        $this->banco->executar($sql, $param);
    }
}
?>
