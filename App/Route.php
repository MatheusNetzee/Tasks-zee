<?php
namespace App;
use SON\Init\Bootstrap;

class Route extends Bootstrap{

    protected function initRoutes(){  	   	

        //pagina inicial
        $routes['home'] = array("route" => "/" , "controller" => "IndexController" , "action" => "index");       

        //tarefas   	
        $routes['adicionaTarefa'] = array("route" => "/adicionaTarefa", "controller" => "TarefaController", "action" => "adiciona");
        $routes['alteraStatus'] = array("route" => "/alteraStatus" , "controller" => "TarefaController" , "action" => "alteraStatus");
        $routes['tarefas'] = array("route" => "/tarefas" ,"controller" => "TarefaController", "action" => "tarefas");       
        $routes['tarefaPorTag'] = array("route" => "/tarefaTag", "controller" => "TarefaController", "action" => "tarefaTag");

        // tags
        $routes['tag'] = array("route" => "/tag", "controller"=> "TagController", "action" => "tag");
        $routes['adicionaTag'] = array("route" => "/adicionaTag", "controller" => "TagController" , "action" => "adiciona");
        $routes['removeTag'] = array("route" => "/removeTag" , "controller" => "TagController" , "action" => "remove");       

        // email
        $routes['enviaEmail'] = array("route" => "/enviaEmail", "controller" =>"EmailController", "action" => "enviaEmail");

        $this->setRoute($routes);
    }
}