<?php
require("./database/conexao.php");

switch ($_POST["acao"]) {

  case "inserir":
        //se houver o envio do fomulário com uma tarefa
        if (isset($_POST["tarefa"])) {
            $tarefa = $_POST["tarefa"];

            //declara o SQL de inserção
            $sqlInsert = " INSERT INTO tbl_task (descricao) VALUES ('$tarefa') ";

            //executa o SQL
            $resultado = mysqli_query($conexao, $sqlInsert);

            if($resultado){
                $mensagem = "Tarefa adicionada com sucesso!";
                $tipoMensagem = "sucesso";
            }else{
                $mensagem = "Erro ao adicionar tarefa!";
                $tipoMensagem = "erro";
            }

            // //redirecionar para index.php (página das tarefas)
            // header("location: index.php?mensagem=$mensagem"); //$_GET query params
        }
  break;
  case "deletar":
    //Se a tarefa id for enviada e se ela for diferente de vazio, então poderá executar todo o trecho que está dentro dela
    if (isset($_POST["tarefaId"]) && $_POST["tarefaId"] != "") {//   Valifdação
      //receber o id da tarefa
      $tarefaId = $_POST["tarefaId"];
      //montar o sql de deleção com id de tarefa
      $sqlDelete = "DELETE FROM tbl_task WHERE id = $tarefaId"; //Deve concatenar a terefa ali, pois no Mysql ele pede o id que você deseja excluir, e lolo deve-se passar determinado elemento.
      
      //Agora executamos o mySQL
      $resultado = mysqli_query($conexao, $sqlDelete);

      if($resultado == false){
        $mensagem = "Erro ao deletar a tarefa!";
        $tipoMensagem = "sucesso";
      }else{
        $mensagem = "Tarefa deletada com sucesso!";
        $tipoMensagem = "erro";
      }
      header("location: index.php");
    }   
  break;
  case "editar";

    if(isset($_POST["tarefa"]) && isset($_POST["tarefaId"])){
      $tarefa = $_POST["tarefa"];
      $taferaId = $_POST["tarefaId"];
      
      $sqlUpdate = " UPDATE tbl_task SET descricao = '$tarefa' WHERE id = $taferaId ";

      $resultado = mysqli_query($conexao, $sqlUpdate);

      if($resultado){
          $mensagem = "Tarefa editada com sucesso!";
          $tipoMensagem = "sucesso";
      }else{
          $mensagem = "Erro ao editar a tarefa!";
          $tipoMensagem = "erro";
      }

      
    }
    break;

    default:
      die("Ops, ação inválida");
      break;
}
header("location: index.php?mensagem=$mensagem&tipoMensagem=$tipoMensagem");

//e redirecionar para a index com a mensagem