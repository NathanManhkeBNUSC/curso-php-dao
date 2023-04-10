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
$search = Usuario::search("Na");

echo json_encode($search);


?>