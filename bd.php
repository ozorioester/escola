<?php

function dbcon()
{

    $servidor = '127.0.0.1';
    $usuario = "root";
    $senha = "brasil";
    $database = "escola";
    $port = 8889;
    
    $con = mysqli_connect($servidor, $usuario, $senha, $database, $port);
    mysqli_set_charset($con, "utf8");
    
    return $con;
}
    