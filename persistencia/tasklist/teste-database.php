<?php
//EM PHP, HOJE EM DIA, TEMOS DUAS MANEIRAS DE MANIPULAR BD.
//MYSQLi & PDO -> ver sobre isso aqui.

require("./database/conexao.php"); 

//declaramos a consulta a ser executada
$query = " SELECT * FROM tbl_task ";

//executamos a consulta utilizando a conexão criada e recebemos o resultado
$resultado = mysqli_query($conexao, $query) or die(mysqli_error($conexao));

//tratando o erro na consulta
if($resultado == false){
    echo mysqli_error($conexao);
}

//trazendo a primeira linha da tabela
// $linha1 = mysqli_fetch_array($resultado);

// // //trazendo a segunda linha da tabela
// $linha2 = mysqli_fetch_array($resultado);

// // //trazendo a terceira linha da tabela
// $linha3 = mysqli_fetch_array($resultado);

// echo "A tarefa da linha 1 é: " . $linha1["descricao"];

// echo "<br /><br />";

// echo "A tarefa da linha 2 é: " . $linha2["descricao"];

// echo "<br /><br />";

// echo "A tarefa da linha 3 é: " . $linha3["descricao"];

$minhaTarefa = "Nova Tarefa";

$sqlInsert = " INSERT tbl_task (descricao) VALUES ('$minhaTarefa')";

$resultadoInsert = mysqli_query($conexao, $sqlInsert);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>DESCRIÇÃO</th>
        </tr>
        <?php
            while($linha = mysqli_fetch_array($resultado)){
        ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["descricao"] ?></td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>

<?php

    mysqli_close($conexao);

?>