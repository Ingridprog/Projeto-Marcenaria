<?php

interface ResponsavelInterface
{
     public function findByToken($token);
     public function findByEmail($email);
     public function update(Responsavel $responsavel);
}


?>