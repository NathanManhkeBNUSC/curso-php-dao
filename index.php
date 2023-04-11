<?php

 require_once("config.php");

// $sql = new Sql();

// $usuarios = $sql->select("SELECT * FROM tb_usuarios");

// echo json_encode($usuarios);

//Carrega um usuario
// $root = new Usuario();
// $root->loadById(3);
// echo $root;

// //Carrega uma lista de usuario
// $lista = Usuario::getList();

// echo json_encode($lista);


//Carrega uma lista dde usuarios buscando pelo login
// $search = Usuario::search("Na");

// echo json_encode($search);

//Carrega um usuario usando o login e a senha 

// $usuario = new Usuario();
// $usuario->login("Teste","S@nta799");

// echo $usuario;

//Insert de um usuario novo

// $aluno = new Usuario("Aluno1", "Aluno2", "S121212");

// $aluno->setNome("Aluno");
// $aluno->setUsuario("aluno");
// $aluno->setSenha("Teste");

// $aluno->insert();

// echo $aluno;

//Update do usuario 

// $usuario = new Usuario();

// $usuario->loadById(6);

// $usuario->update("Professor", "Professor", "Testes123");

// echo $usuario;

$usuario = new Usuario();

$usuario->loadById(6);

$usuario->delete();

echo $usuario;

?>