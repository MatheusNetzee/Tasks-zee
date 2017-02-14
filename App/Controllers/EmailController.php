<?php
namespace App\Controllers;
use SON\Controller\Action;
use SON\DI\Container;

class EmailController extends Action{

	public function enviaEmail(){

		$tarefa = Container::getDao("DaoTarefa");
		$this->views->tarefas=  $tarefa->listaTarefa();

		$tag = Container::getDao("DaoTag");		
		$this->views->tags = $tag->listaTag();

		$this->render("EnviaEmail", true);
	}
}