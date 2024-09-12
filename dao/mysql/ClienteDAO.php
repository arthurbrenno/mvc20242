<?php
namespace dao\mysql;

use dao\interface\IClienteDAO;
use generic\MysqlFactory;

class ClienteDAO extends MysqlFactory implements IClienteDAO{

    public function listar(){
       
        $sql="select id, nome from clientes";
       $retorno= $this->banco->executar($sql);
       return $retorno;
    }
    public function alterar($id,$nome){
        $sql = "update clientes set nome=:nome where id=:id";
        $param=[
            "id" =>$id,
            "nome" =>$nome
        ];
        $this->banco->executar($sql,$param);
    }
    public function dados($id){
        $sql = "select id, nome from clientes where id=:id";
        $param=[
            "id" =>$id
          
        ];
        return $this->banco->executar($sql,$param);
    }
}

?>