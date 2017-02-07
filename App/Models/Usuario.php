<?php 
namespace App\Models;

class Usuario{

	protected $db; 
	protected $usuario;

	public function __construct(\PDO $db){
		$this->db = $db;	
	}

	public function adicionaUsuario($nome, $email, $senha){
		$query = "insert into usuario (nome, email, senha) values (:nome, :email, :senha)";
		return $this->db->query($query);
		$statment->bindParam(':nome', $nome);
		$statment->bindParam(':email',$email);
		$statment->bindParam(':senha',$senha);
		$statment->execute();
		return $statment;		
	}

	public function removeUsuario($id){
		$query = "delete from usuario where id = ':id";
		$statment = $this->db->prepare($query);
		$statment->bindParam(':id', $id);
		$statment->execute();		
	}

	public function alteraUsuario($nome, $email, $foto, $senha){
		$query = "update usuario set nome = ':nome' , email = ':email', foto = ':foto', senha = ':senha'" ;
		$statment = $this->db->prepare($query);
		$statment->bindParam(':nome', $nome);
		$statment->bindParam(':email',$email);
		$statment->bindParam(':foto',$foto);
		$statment->bindParam(':senha',$senha);
		$statment->execute();

		return $statment;
	}

	public function listaUsuario(){
		$query = "select * from usuario";
		$result = $this->db->prepare($query);

		$usuarios = array();

		while($usuarioArray = $result->fetch(\PDO::FETCH_ASSOC)){
				array_push($usuarios, $usuario);
		}
		return $usuarios;
	}

	public function buscaUsuario($id){
		$query = "Select * from usuario where id = :id";
		$statement = $this->db->prepare($query);
		$statement->bindParam(':id',$id);
		$statement->execute();

		return $statement->fetch(\PDO::FETCH_ASSOC);

	}

	public function verificaUsuario($email, $senha){
		$query = "select * from usuario where email = ':email' and senha = ':senha' ";
		$statment = $this->db->prepare($query);
		$statment->bindParam(':email',$email);
		$statment->bindParam(':senha',$senha);
		$statment->execute();
	
		return $statment->fetch(\PDO::FETCH_ASSOC);
	}
}