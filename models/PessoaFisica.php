<?php

class PessoaFisica
{

     private $id;
     private $nome;
     private $telefone;
	private $celular;
	private $email;
     private $cpf;

	public function  getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function  getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function  getTelefone() {
		return $this->telefone;
	}

	public function setTelefone($telefone) {
		$this->telefone = $telefone;
	}

	public function  getCelular() {
		return $this->celular;
	}

	public function setCelular($celular) {
		$this->celular = $celular;
	}

	public function  getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function  getCpf() {
		return $this->cpf;
	}

	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
}

?>