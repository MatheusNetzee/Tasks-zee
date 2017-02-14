<?php
namespace App\Dao;
use App\Entity\Tarefa;
use App\Entity\Tag;
use App\bootstrap;

class DaoTarefa{

	public function listaTarefa(){
		$entityManager = getEntityManager();
		$qb = $entityManager->createQueryBuilder();
		$qb->select('t')
		   ->from('App\Entity\Tarefa', 't')
		   ->orderBy('t.estado' , 'DESC');
		$query = $qb->getQuery();
		$result = $query->getResult();
		return $result;
		
	}

	public function adicionaTarefa(Tarefa $tarefa, $id_tag){
		$entityManager = getEntityManager();
		$tagEntity = $entityManager->getRepository(Tag::class);

		foreach($id_tag as $tag):
			$tag_tarefa = $tagEntity->find($tag);
			$tarefa->addTag($tag_tarefa);
		endforeach;		

		$entityManager->persist($tarefa);		
		return $entityManager->flush();
	}
	

	public function alteraStatus($id){

		$entityManager = getEntityManager();
        $repository = $entityManager->getRepository(Tarefa::class);
 		$tarefa = $repository->find($id);
	
		if( ($tarefa->getEstado() == "NI") || ($tarefa->getEstado() == "A") ){ 

			$query = $entityManager->createQuery("UPDATE App\Entity\Tarefa t SET t.estado = 'F' where t.id = ". $id);
			$result = $query->getResult();
			return $result;

		} elseif( $tarefa->getEstado() == "F"){

			$query = $entityManager->createQuery("UPDATE App\Entity\Tarefa t SET t.estado = 'NI' where t.id = ". $id);
			$result = $query->getResult();
			return $result;
        }
	}

	public function tarefaAdicionaAtraso(){
		$entityManager = getEntityManager();
		$query = $entityManager->createQuery("update App\Entity\Tarefa t set t.data = CURRENT_DATE(), t.estado = 'A' where t.data < CURRENT_DATE() and t.estado != 'F' ");
		$result = $query->getResult();
		return $result;
	}

}