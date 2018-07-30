<?php

require_once "config.php";


//LISTAR USUARIO POR ID
//$usuario = new Usuario;
//$usuario->listaUsuarioPorId(2);
//echo $usuario;
//echo "<br>++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";

//Listar todos usuarios
//$lista = $usuario->listarUsuarios();
//echo json_encode($lista);
//echo "<br>++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";

//BUSCAR USUARIO POR LOGIN
//$buscaPorlogin = $usuario->buscaUsuarioPorlogin("a");
//echo json_encode($buscaPorlogin);
//echo "<br>++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";

// CONFRIMAR LOGIN 
//$confirmarLogin  = $usuario->confirmarLogin("andre","1023");
//echo $confirmarLogin;

//CRIANDO INSERT DAO
//$aluno  = new Usuario("andre123", "caca");
//$aluno->insert();
// echo $aluno;


//ataulizando usuario
/*
$usuario = new Usuario();
$usuario->listaUsuarioPorId(9);
$usuario->update("jj", "jj");
echo $usuario;*/


$usuario = new Usuario();
$usuario->listaUsuarioPorId(8);
$usuario->delete();
echo $usuario;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>