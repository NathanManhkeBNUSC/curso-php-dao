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
            $this->setData($result[0]);            
        }

    }

    //Static posso chamar ele direto sem estanciar o objeto
    public static function getList(){

        $sql = new Sql();
        
        $return = $sql->select("SELECT * FROM tb_usuarios ORDER BY usuario;");
        

    }


    public static function search($login){

        $sql = new Sql();

        $return = $sql->select("SELECT * FROM tb_usuarios WHERE usuario LIKE :SEARCH ORDER BY usuario", array(

            ':SEARCH'=>"%.$login.%"

        ));

    }

    public function login($usuario, $password){

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE usuario = :USUARIO AND  senha = :PASSWORD", array(
            ":USUARIO"=>$usuario,
            ":PASSWORD"=>$password
        ));

        //Isset significa para verificar se algo exite
        if (isset($result[0])) {

            $this->setData($result[0]);
           
        } else {

            throw new Exception("Login e/ou Senha invalidos");

        }

    }

    public function setData($data){

        $this->setId($data['id']);
        $this->setNome($data['nome']);
        $this->setUsuario($data['usuario']);
        $this->setSenha($data['senha']);

    }

    public function insert(){

        $sql = new Sql();

        $result = $sql->select("CALL sp_usuarios_insert(:NOME, :USUARIO, :SENHA)", array(
            ':NOME'=>$this->getNome(),
            ':USUARIO'=>$this->getUsuario(),
            ':SENHA'=>$this->getSenha()
        ));

        if (count($result) > 0) {
            $this->setData($result[0]);
        }

    }

    public function update($nome, $usuario, $senha){

        $this->setNome($nome);
        $this->setUsuario($usuario);
        $this->setSenha($senha);

        $sql = new Sql();

        $sql->Queryphp("UPDATE tb_usuarios SET nome = :NOME, usuario = :USUARIO, senha = :SENHA WHERE id = :ID", array(
            ':NOME'=>$this->getNome(),
            ':USUARIO'=>$this->getUsuario(),
            ':SENHA'=>$this->getSenha(),
            ':ID'=>$this->getId()
        ));

    }

    public function delete(){

        $sql = new Sql();
        
        $sql->Queryphp("DELETE FROM tb_usuarios WHERE id = :ID",array(
            ':ID'=>$this->getId()
        ));

        $this->setId(0);
        $this->setNome("");
        $this->setUsuario("");
        $this->setSenha("");

    }

    //aqui irei fazer um metodo construtor para não chamar asssim no index
    // $aluno->setNome("Aluno");
    // $aluno->setUsuario("aluno");
    // $aluno->setSenha("Teste");

    public function __construct($nome = "", $usuario = "", $senha = ""){

        $this->setNome($nome);
        $this->setUsuario($usuario);
        $this->setSenha($senha);
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