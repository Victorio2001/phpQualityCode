<?php
declare(strict_types=1);
require_once("../../config/globalConfig.php");
require_once("../../config/localConfig.php");


echo 'InsertUtilisateur';
$monUser = new \MonApp\model\DTO\Utilisateur();
$DaoUtilisateur = new \MonApp\model\DAO\DAOutilisateur();
try{
    $MdpHash = password_hash("root", PASSWORD_DEFAULT);
    $monUser->setNom("Root");
    $monUser->setPrenom("Root");
    $monUser->setEmail("Root@gmail.com");
    $monUser->setInitiales("RT");
    $monUser->setMdp($MdpHash);
    $insertUser = $DaoUtilisateur->insertUser($monUser);
} catch(Exception $e){
    var_dump("Miiiiiiince sa marche pas hehehehehhe");
}