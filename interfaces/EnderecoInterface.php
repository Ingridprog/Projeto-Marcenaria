<?php

interface EnderecoInterface 
{
     public function add(Endereco $endereco);
     public function findById($id);
     public function findAll();
     public function findByIdPessoa($idCliente, $tipo);
     public function update(Endereco $endereco);
     public function delete($id);
}

?>