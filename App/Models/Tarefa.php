<?php
namespace App\Models;

class Tarefa{

	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function adicionaTarefa($prioridade, $nome, $descricao,$status, $data, $tempoEstimado, $id_tag){
		$query = "insert into tarefa (prioridade, nome, descricao, estado, data, tempoEstimado) values (:prioridade, :nome, :descricao, :status , :data, :tempoEstimado)";			
			$statment = $this->db->prepare($query);
			$statment->bindParam(':prioridade',$prioridade);
			$statment->bindParam(':nome', $nome);
			$statment->bindParam(':descricao', $descricao);
			$statment->bindParam(':status', $status);
			$statment->bindParam(':data', $data);
			$statment->bindParam(':tempoEstimado', $tempoEstimado);
			$statment->execute();

			$tarefa_id = $this->db->lastInsertId();

			foreach($id_tag as $tag_id):
				$sql = "insert into tarefa_tag (id_tag, id_tarefa) values (:id_tag, :id_tarefa)";
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(':id_tag', $tag_id);			
				$stmt->bindValue(':id_tarefa', $tarefa_id);
				$stmt->execute();
			endforeach;

		return array($statment , $stmt);
	}

	public function buscaTarefaTag($id){
		$query =  "select tag, id_tag, from tarefa_tag tg
					inner join	tag on tag.id = id_tag
					where tg.id_tarefa = '{$id}'";
		$result = $this->db->query($query);
		return $result->fetchAll(\PDO::FETCH_ASSOC);

	}


	public function removeTarefa($id){
		$query = "delete from tarefa where id = :id";
		$statment = $this->db->prepare($query);
		$statment->bindParam(':id', $id);
		$statment->execute();

		return $statment;
	}

	public function listaTarefa(){		
		$query = "select * from tarefa order by data ASC , estado DESC";		
		$result = $this->db->query($query);
		return $result->fetchAll(\PDO::FETCH_ASSOC);

	}
	
	public function alteraTarefa(){
		$query = "update tarefa set prioridade = ':prioridade', nome = ':nome', descricao = ':descricao', tempoEstimado = ':tempoEstimado' , estado = ':status', data = ':data'";

			$statment = $this->db->prepare($query);
			$statment->bindParam(':prioridade',$prioridade);
			$statment->bindParam(':nome', $nome);
			$statment->bindParam(':descricao', $descricao);
			$statment->bindParam(':status', $status);
			$statment->bindParam(':data', $data);
			$statment->bindParam(':horario', $horario);
			$statment->execute();

		return $statment;
	}

	public function alteraStatus($id){
		$sql = "Select estado from tarefa where id = {$id}" ;
		$res = $this->db->query($sql);
		$result = $res->fetch();
	
		if(($result["estado"] == "NI") || ($result["estado"] == "A")){
			$query = "update tarefa set estado = 'F' where id = :id";
			$stmt = $this->db->prepare($query);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return $stmt;					

		} elseif($result["estado"] == "F") {
			$query = "update tarefa set estado = 'NI' where id = :id";
			$stmt = $this->db->prepare($query);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return $stmt;	
		}
	}

	public function tarefaTirarAtraso(){
		$query = "update tarefa set data = CURDATE(), estado = 'A' where data < CURDATE() and estado != 'F'";
		$result = $this->db->query($query);
		return $result;
	}

	public function buscarTarefaTag($id){

		$query = "select t.id, t.cor, t.nome as nomeTag, f.* from tag as t 
					inner join tarefa_tag as tg on t.id = tg.id_tag
					inner join tarefa as f on f.id = tg.id_tarefa where t.id=:id and data = curdate() order by estado DESC";
		$stmt = $this->db->prepare($query);	
		$stmt->bindParam(":id", $id);
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function contadorTarefa(){
		$query = "select count(id) from tarefa";
		$result = $this->db->query($query);
		return $result->fetchAll(\PDO::FETCH_ASSOC);
	}
}

	// $stmt = $this->db->prepare($sql);
	// 	$stmt->bindParam(':id', $id);
	// 	$stmt->execute();

