<?php
namespace App\Controllers;
use SON\Controller\Action;
use SON\DI\Container;
use App\Entity\Tarefa;
use App\Dao\DaoTarefa;
use App\Dao\DaoTag;
use App\Doctrine;
use DateTime;

class TarefaController extends Action{

	public function tarefas(){
		$tagDao = Container::getDao("DaoTag");
   		$this->views->tags = $tagDao->listaTag();

		$tarefaDao = Container::getDao("DaoTarefa");
		$this->views->tarefas = $tarefaDao->listaTarefa();	
		$this->views->atraso = $tarefaDao->tarefaAdicionaAtraso(); 
		$this->render("Tarefa", true);

	}

	public function adiciona(){
		
		$tarefaDao = Container::getDao("DaoTarefa");
		$tagDao = Container::getDao("DaoTag");

	if(isset($_POST['prioridade']) && isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['data']) && isset($_POST['tempoEstimado']) && isset($_POST['id_tag'])){

		$tarefa = new Tarefa();
		$tarefa->setPrioridade($_POST['prioridade']);
		$tarefa->setNome($_POST['nome']);
		$tarefa->setDescricao($_POST['descricao']);
		$tarefa->setEstado("NI");
		$tarefa->setData(New DateTime($_POST['data']));
		$tarefa->setTempoEstimado($_POST['tempoEstimado']);
		$id_tag = $_POST['id_tag'];

		$tarefaDao->adicionaTarefa($tarefa, $id_tag);
		$msg = "A tarefa adicionada com sucesso";
		header("Location:". URL. "tarefas?msg=$msg");
		} else 
			$msg = "A tarefa não foi adicionada";
			header("Location:". URL ."tarefas?msg=$msg");	
		
	}

	public function alteraStatus(){

		$tarefaDao = Container::getDao("DaoTarefa");
		$id = $_POST['tarefa_id'];

		if($tarefaDao->alteraStatus($id)){
			$msg = "O status da tarefa {$tag->getNome} foi alterado com sucesso";
			header("Location:". URL."tarefas?msg=$msg");
		}

	}

	public function tarefaTag(){

		//$id = $_GET['id_tag'];

		$tarefaDao =  Container::getDao("DaoTarefa");
		$tagDao = Container::getDao("DaoTag");

		$this->views->listaTags = $tagDao->listaTag();
		$this->views->tarefas =  $tarefaDao->listaTarefa();
		//$this->views->buscarTarefaTag = $tarefaDao->buscaTarefaTag($id);  
		$this->render("tarefaTag", true);
	}


}
