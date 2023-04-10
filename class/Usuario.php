<?php

class Usuario{

    private $id;
    private $nome;
    private $usuario;
    private $senha;

    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($value){
        $this->nome = $value;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($value){
        $this->usuario = $value;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($value){
        $this->senha = $value;
    }

    public function loadById($id){

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE id = :id", array(
            ":id"=>$id
        ));

        //Isset significa para verificar se algo exite
        if (isset($result[0])) {

            $row = $result[0];

            $this->setId($row['id']);
            $this->setNome($row['nome']);
            $this->setUsuario($row['usuario']);
            $this->setSenha($row['senha']);

        }

    }

    public function __toString(){
        return json_encode(array(
            "id"=>$this->getId(),
            "nome"=>$this->getNome(),
            "usuario"=>$this->getUsuario(),
            "senha"=>$this->getSenha()
        ));
    }

}

?>