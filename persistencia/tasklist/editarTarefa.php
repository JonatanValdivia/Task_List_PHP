<?php
  require("./database/conexao.php");//Include mesmo com erro continua o processo, já require meio que "mata o processo", exibindo apenas os erros.
  //Include -> quando não é importante para a página
  //Require -> quando há importância algo essencial.. 
  //Recebendo o id tarefa a ser editado

  $tarefaId = $_GET["tarefaId"];
  $sqlSelect = " SELECT * FROM tbl_task WHERE id = $tarefaId ";
  //Executar a consulta (mysqli_query)
  $resultado = mysqli_query($conexao, $sqlSelect);
  //Extrair a linha da consulta (mysql_fetch_array)
  $tarefa = mysqli_fetch_array($resultado);
  if(!$tarefa){
    die("Impossível editar, tarefa não encontrada");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styleGlobal.css">
</head>
<body>
  <div class="content">
       <h1>Editar Tarefa</h1>
      <form method="POST" action="taskActions.php">
       <input type="hidden" name="acao" value="editar" />
        <input type="hidden" name="tarefaId" value="<?= $tarefa["id"] ?>"/>
          <div class="input-group">
            <label for="tarefa">Descrição da tarefa</label>
            <input type="text" value="<?= $tarefa['descricao'] ?>"  name="tarefa" id="tarefa" velue="abobrinha "required placeholder="Digite a tarefa" />
          </div>
          <button>Editar</button>
      </form>
  </div>

</body>

</html>