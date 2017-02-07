<?php
namespace App\Controllers;
use SON\Controller\Action;
use SON\DI\Container;

class TagController extends Action{

   public function tag(){
   		$tag = Container::getModel('Tag');
   		$this->views->tags = $tag->listaTag();
        $this->render("Tag", true);
    }  	

	public function adiciona(){
		$tag = Container::getModel("Tag");

		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$cor = $_POST['cor'];

		if($tag->adicionaTag($nome, $descricao, $cor)){
			$msg = "Tag {$nome} adicionada com sucesso";
			header("Location:". URL."tag?msg=$msg");
		} else{
			$msg = "Tag {$nome} não foi adicionada ";
			header("Location:". URL."tag?msg=$msg");	
		}		
	}

	public function remove(){
		$tag = Container::getModel("Tag");

		$id = $_POST['tag_id'];
		if($tag->removeTag($id)){
			$msg = "Tag removida com sucesso";			
			header("Location:". URL."tag?msg=$msg");
		}
	}
}

	