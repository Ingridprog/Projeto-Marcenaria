<?php

interface DadosExbInterface 
{
     public function add(DadosExb $dadosExb);
     public function findById($id);
     public function findAll();
     public function update(DadosExb $dadosExb);
     public function delete($id);
}

?>