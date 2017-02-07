<?php
namespace App\Controllers;
use SON\Controller\Action;
use SON\DI\Container;

class EmailController extends Action{

    public function enviaEmail(){

    	$tarefa = Container::getModel("Tarefa");
    	$this->views->tarefas = $tarefa->listaTarefa();

    	$tag = Container::getModel("Tag");
    	$this->views->cor = $tag->buscarTagCor(); 

    	$this->render("EnviarEmail", true);

    }
}