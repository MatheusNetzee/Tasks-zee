<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Tag;

/**
* @Entity
* @Table(name="tarefa")
*/
class Tarefa{

	/**
	* @Id
	* @Column(type="integer")
	* @GeneratedValue(strategy="AUTO")
	*/
	private $id;

	/**
	* @Column(type="string", columnDefinition="ENUM('1','2','3')")
	*/
	private $prioridade;

	/**
	* @Column(length=255, nullable=true)
	*/
	private $nome;

	/**
	* @Column(type="text")	
	*/	
	private $descricao;

	/**
	* @Column(type="string", columnDefinition="ENUM('NI','A','F')")
	*/
	private $estado;

	/**
	* @Column(type="date", nullable=true)
	*/
	private $data;

	/**
	* @Column(type="integer")
	*/
	private $tempoEstimado;

	/**
	* @ManyToMany(targetEntity="App\Entity\Tag", inversedBy="tarefa")
	* @JoinTable(
	* name="tarefa_tag",
	* joinColumns={@JoinColumn(name="tarefa_id", referencedColumnName="id")},
   	* inverseJoinColumns={@JoinColumn(name="tag_id", referencedColumnName="id")})
	*/
	protected $tags;

	public function __construct(){
		$this->tags = new ArrayCollection();
	}

	public function addTag(Tag $tag){

		$this->tags->add($tag);
		return $this;

	}

	public function getTag(){

		return $this->tags;

	}

  	/**
    * @return mixed
    */

	public function getId(){

		return $this->id;

	}

	/**
	* @return mixed
	*/

	public function getPrioridade(){

		return $this->prioridade;
	}

	/**
	* @param mixed $prioridade
	* @return Tarefa
	*/

	public function setPrioridade($prioridade){

		$this->prioridade = $prioridade;
		return $this->prioridade;

	}

    /**
    * @return mixed
    */

	public function getNome(){

		return $this->nome;
	}

    /**
    * @param mixed $nome
    * @return Tarefa
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
     * @return Tarefa
     */

	public function setDescricao($descricao){

		$this->descricao = $descricao;
		return $this->descricao;
	}

	/**
    * @return mixed
    */

	public function getEstado(){

		return $this->estado;
	}

	/**
    * @param mixed $estado
    * @return Tarefa
    */

	public function setEstado($estado){

		$this->estado = $estado;
		return $this->estado;
	}

	/**
    * @return mixed
    */

	public function getData(){

		return $this->data;
	}

    /**
    * @param mixed $data
    * @return Tarefa
    */


	public function setData($data){

		$this->data = $data;
		return $this;
	}

	/**
    * @return mixed
    */

	public function getTempoEstimado(){

		return $this->tempoEstimado;
	}

    /**
    * @param mixed $tempoEstimado
    * @return Tarefa
    */

	public function setTempoEstimado($tempoEstimado){

		$this->tempoEstimado = $tempoEstimado;
		return $this->tempoEstimado;
	}
}
