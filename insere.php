<?php

require "db.php"

$nome = $_POST["nome"];
$email = $_POST["email"];
$turma = $_POST["turma"];
$data = $_POST["data"];

$sql = "INSERT INTO alunos (id, nome, email, turma, data)
        VALUES (NULL, '$nome', '$email', '$turma', '$data')";


$servidor = "localhost";
    $usuario = "root";
    $senha = "brasil";
    $database = "escola";
    
    $con = mysqli_connect($servidor, $usuario, $senha, $database);
    mysqli_set_charset($con, "utf8");
    
    $res = mysqli_query($con, $sql);
    
    if($res == true)
    {
        echo "Dados cadastrados com sucesso";
    } else {
        echo "Ocorreu um erro ao cadastrar";
    }
        
        

