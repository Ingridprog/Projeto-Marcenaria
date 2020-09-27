<?php

interface PessoaJuridicaInterface 
{
     public function add(PessoaJuridica $pessoaJuridica);
     public function findById($id);
     public function findAll();
     public function update(PessoaJuridica $pessoaJuridica);
     public function delete($id);
}

?>