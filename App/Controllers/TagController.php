<?php
namespace App\Controllers;
use SON\Controller\Action;
use SON\DI\Container;
use App\Dao\DaoTag;
use App\Entity\Tag;
use App\Doctrine;

class TagController extends Action{

	public function tag(){
		
		$tag = Container::getDao('DaoTag');
   		$this->views->tags = $tag->listaTag();
        $this->render("Tag", true);
	}

	public function adiciona(){

		$tag = Container::getEntity("Tag");
		$tagDao = Container::getDao("DaoTag");

		if(isset($_POST['nome']) && (!$_POST['nome'] == "") && (isset($_POST['descricao'])) && (!$_POST['descricao'] == "") ){
			$tag = new Tag();
			$tag->setNome($_POST['nome']);
			$tag->setDescricao($_POST['descricao']);
			$tag->setCor($_POST['cor']);
			$tagDao->adiciona($tag);
			$msg = "Tag adicionada com sucesso";			
			header("Location:". URL."tag?msg=$msg");
		} else{
			$msg = "Tag nao adicionada";			
			header("Location:". URL."tag?msg=$msg");
		}
	}

	public function remove(){

		$tagDao = Container::getDao("DaoTag");

		if(isset($_POST['tag_id']) ){
			$id = $_POST['tag_id'];	
			$tagDao->remove($id);
			$msg = "Tag removida com sucesso";			
			header("Location:". URL."tag?msg=$msg");
		}		
	}
}