<?php

namespace App\Dao;
use App\Entity\Tag;
use App\bootstrap;

class DaoTag{

	public function listaTag(){
		$entityManager = getEntityManager();
		$lista = $entityManager->getRepository(Tag::class);
		$result = $lista->findAll();
		return $result;
	}

	public function adiciona(Tag $tag){
		$entityManager = getEntityManager();
		$entityManager->persist($tag);
		return $entityManager->flush();			
	}

	public function remove($id){
		$entityManager = getEntityManager();		
		$repository = $entityManager->getRepository(Tag::class);

		$tag = $repository->find($id);
		$entityManager->remove($tag);
		return $entityManager->flush();
	}

}