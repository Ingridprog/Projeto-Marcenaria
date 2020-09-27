<?php

interface PessoaFisicaInterface 
{
     public function add(PessoaFisica $pessoaFisica);
     public function findById($id);
     public function findAll();
     public function update(PessoaFisica $pessoaFisica);
     public function delete($id);
}

?>