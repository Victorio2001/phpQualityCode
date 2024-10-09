<?php
require_once '../../config/localConfig.php';
use MonApp\model\DAO\DAOutilisateur;
use MonApp\model\DTO\Utilisateur;

//$user = new Utilisateur();
//$user->setEmail("victoriogdlp@gmail.com");
//$user->setMdp("1428Victorio///");
//$repoUser = new DAOutilisateur();
//
//$result = $repoUser->getByEmailAndPassword($user);
//var_dump($result);
//
//if ($result) {
//    echo $result->getEmail();
//} else {
//    echo "sal merde y'a rien";
//}

use MonApp\model\DTO\Artefact;
use MonApp\model\DAO\DaoArtefact;

$arte = new DaoArtefact();
$getall = $arte->getAll();

var_dump($getall);


?>






