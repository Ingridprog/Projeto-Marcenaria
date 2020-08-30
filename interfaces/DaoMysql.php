<?php

interface DaoMysql 
{
     public function add($objeto);
     public function findById($id);
     public function findAll();
     public function update($objeto);
     public function delete($id);
}

?>