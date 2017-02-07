<?php
namespace App\Controllers;
use SON\Controller\Action;
use SON\DI\Container;

class IndexController extends Action{

    public function index(){    	      
    	$tarefa = Container::getModel("Tarefa");
    	$this->views->atraso = $tarefa->tarefaTirarAtraso(); 	
        $this->render("index", true);
    }

}