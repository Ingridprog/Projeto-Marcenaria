<?php

interface DaoMysql 
{
     public function add($objeto, $tipo=0);
     public function findById($id);
     public function findAll();
     public function update($objeto, $tipo=0);
     public function delete($id);
}

?>