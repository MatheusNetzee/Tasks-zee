<?php
namespace App\Models;

class Tag{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function adicionaTag($nome, $descricao, $cor){
		$query = "insert into tag (nome, descricao, cor) values (:nome, :descricao, :cor)";
		$statement = $this->db->prepare($query);
		$statement->bindValue(":nome",$nome);
		$statement->bindValue(":descricao", $descricao);
		$statement->bindValue(":cor", $cor);		
		$statement->execute();	

		return $statement;
	}

	public function removeTag($id){
		$query = "delete from tag where id = :id";
		$statment = $this->db->prepare($query);
		$statment->bindValue(':id', $id);
		$statment->execute();	

		return $statment;
	}

	public function listaTag(){
		$query = "select * from tag";
		$result = $this->db->query($query);
		return $result->fetchAll(\PDO::FETCH_ASSOC);		
	}

	public function alteraTag($nome, $descricao, $cor){
		$query = "update tag set nome = :nome, descricao = :descricao, cor = :cor";
		$statment = $this->db->query($query);
		$statment->bindValue(':nome', $nome);
		$statment->bindValue(':descricao',$descricao);
		$statment->bindValue(':cor',$cor);
		$statment->execute();

		return $statment;
	}

	public function buscarTagCor(){
		$query = "select t.*, f.id from tag as t 
					inner join tarefa_tag as tg on t.id = tg.id_tag
					inner join tarefa as f on f.id = tg.id_tarefa
					order by t.id";
		$result = $this->db->query($query);	
		return $result->fetchAll(\PDO::FETCH_ASSOC);
	}


}