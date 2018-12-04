
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alunos Matriculados</title>
        <link href="css/site.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <h1>Alunos Matriculados</h1>
        
        <form action="insere.php" method="post">
            <fieldset>
                <label>Nome</label>
                <input type="text" name="nome" />
                <br>
                
                <label>Email</label>
                <input type="email" name="email" />
                <br>
                
                <label>Turma</label>
                <select name="turma">
                    <option value="PHP1">PHP1</option>
                    <option value="PHP2">PHP2</option>
                    <option value="Mysql">Mysql</option>
                    <option value="AJAX">Ajax</option>
                    <option value="HTML">HTML</option>
                </select>
                <br>
                
                <label>Data de nascimento</label>
                <input type="date" name="data" >
                <br>
                
                <button type="submit" >Cadastrar</button>
                
            </fieldset>
        </form>
        
        <table>
            <tr>
                <th><a href="?coluna=nome">Nome</a></th>
                <th><a href="?coluna=email">Email</a></th>
                <th><a href="?coluna=turma">Turma</a></th>
                <th><a href="?coluna=data">Data de Aniversário</a></th>
            </tr>
            
<?php

    require "bd.php";    
    /*
    if (isset($_GET["coluna"]) == false)
    {
        $coluna = "nome";
        
    } else {
        $coluna = $_GET["coluna"];
    } */
    
    // if ternario
    $coluna = (isset($_GET["coluna"]) == false) ? "nome" : $_GET["coluna"];

    $con = dbcon();
    
    $sql = "SELECT * FROM alunos ORDER BY $coluna ASC";
    
    $res = mysqli_query($con, $sql);
    
    $alunos = mysqli_fetch_all($res, MYSQLI_ASSOC);

    foreach ($alunos as $aluno)
    {
        $data_ori = $aluno["data"];
        $nova = explode("-", $data_ori);
        $time = mktime(0, 0, 0, $nova[1], $nova[2], $nova[3], $nova[0]);
        $data = date('d/M/Y', $time);
            
        echo "   <tr>";
        echo "        <td>". $aluno["nome"] ."</td>";
        echo "        <td>". $aluno["email"] ."</td>";
        echo "        <td>". $aluno["turma"] ."</td>";
        echo "        <td>". $aluno["data"] ."</td>";
        echo "    </tr>";
    }
?>                    
        </table>
        
        
    </body>
</html>
