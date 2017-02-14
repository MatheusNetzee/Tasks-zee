<?php
namespace App\Controllers;
use SON\Controller\Action;
use SON\DI\Container;

class IndexController extends Action{

	public function index(){
		$tarefa = Container::getDao("DaoTarefa");
		$this->views->atraso = $tarefa->tarefaAdicionaAtraso(); 
		$this->render("index", true);
	}
}