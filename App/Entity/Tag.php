<?php

namespace App\Entity;
/**
* @Entity
* @Table(name="tag")
*/
class Tag{

	/**
	* @Id
	* @Column(type="integer")
	* @GeneratedValue(strategy="AUTO")
	*/
	private $id;

	/**
	* @Column(length=255, nullable=true)
	*/
	private $nome;

	/**
	* @Column(length=255, nullable=true)
	*/
	private $descricao;

	/**
	* @Column(length=255, nullable=true)
	*/
	private $cor;

	/**
     * @return mixed
     */

	public function getId(){

		return $this->id;
	}

	/**
     * @return mixed
     */

	public function getNome(){

		return $this->nome;
	}


	/**
	 * @param mixed $nome
     * @return Tag
     */

	public function setNome($nome){

		$this->nome = $nome;
		return $this->nome;	

	}

	/**
     * @return mixed
     */

	public function getDescricao(){

		return $this->descricao;

	}

	/**
	 * @param mixed $descricao
     * @return Tag
     */

	public function setDescricao($descricao){

		$this->descricao = $descricao;
		return $this->descricao;

	}

	/**
     * @return mixed
     */

	public function getCor(){

		return $this->cor;

	}

	/**
	 * @param mixed $cor
     * @return Tag
     */

	public function setCor($cor){

		$this->cor = $cor;
		return $this->cor;
	}

}