<?php
namespace App\Controllers;
use SON\Controller\Action;
use SON\DI\Container;

class TarefaController extends Action{

	public function tarefas(){
		$tag = Container::getModel("Tag");
   		$this->views->tags = $tag->listaTag();
   		$this->views->cor = $tag->buscarTagCor();

		$tarefa = Container::getModel("Tarefa");
		$this->views->tarefas = $tarefa->listaTarefa();	
		$this->views->atraso = $tarefa->tarefaTirarAtraso(); 
		$this->render("Tarefas", true);

	}

	public function adiciona(){

		$tarefa = Container::getModel("Tarefa");

		$prioridade = $_POST['prioridade'];
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];		
		$status = "NI";
		$data = $_POST['data'];
		$tempoEstimado = $_POST['tempoEstimado'];
		$id_tag = $_POST['id_tag'];	

		if($tarefa->adicionaTarefa($prioridade, $nome, $descricao, $status, $data, $tempoEstimado, $id_tag)){
			$msg = "Tarefa {$nome} adicionada com sucesso ";
			header("Location:". URL."tarefas?msg=$msg");
		}else{
			$msg = "Tarefa {$nome} não adicionada";
			header("Location:". URL."tarefas?msg=$msg");
		}		

	}

	public function alteraStatus(){
		$tarefa = Container::getModel("Tarefa");
		
		$id = $_POST['tarefa_id'];

		if($tarefa->alteraStatus($id)){
			$msg =  "Status da tarefa foi alterado com sucesso";
			header("Location:". URL."tarefas?msg=$msg");
		}else{
			$msg =  "Status da tarefa não foi alterado";
			header("Location:". URL."tarefas?msg=$msg");
		}
			
	}
	public function tarefaTag(){

		$id = $_GET['id_tag'];

		$tarefa = Container::getModel("Tarefa");
		$tag = Container::getModel("Tag");
		$this->views->listaTags = $tag->listaTag();
		$this->views->buscarTarefaTag = $tarefa->buscarTarefaTag($id);  
		$this->render("tarefaTag", true);
	}

}

 // $routes['tarefaAtraso'] = array("route" => "/tarefas" , "controller" => "TarefaController" , "action" => "")