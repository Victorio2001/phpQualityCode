<?php
require_once("../../config/globalConfig.php");
require_once("../../config/localConfig.php");
use MonApp\model\DTO\Utilisateur;
use MonApp\model\DAO\DAOutilisateur;

$DAOUser = new DAOutilisateur();
$MonUser = new Utilisateur();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['AddUtilisateur'])) {
//    if(hash_equals($_SESSION['tokenModifAddUser'], $_POST['token']))
//    {
        unset($_SESSION['tokenModifAddUser']);
        unset($_POST['token']);
        //Filtrage des données réceptionné par la requête.
        $filters = [
            'NomUser' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'PrenomUser' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'MotDePasse' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'Initiales' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'Email' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        ];
        //Ici on applique les filtres aux données reçues et on extrait ces données
        $sanitized_data = filter_input_array(INPUT_POST, $filters);
        //La fonction extract crée des variables PHP à partir des cléstableau qu'il nous est possible d'utiliser par la suite.
        //https://www.w3schools.com/php/func_array_extract.asp
        extract($sanitized_data, EXTR_SKIP);
        $hashedPassword = password_hash($MotDePasse, PASSWORD_DEFAULT);
        $MonUser->setNom($NomUser);
        $MonUser->setPrenom($PrenomUser);
        $MonUser->setMdp($hashedPassword);
        $MonUser->setInitiales($Initiales);
        $MonUser->setEmail($Email);
        $DAOUser->insertUser($MonUser);
        //Redirection
        $MessageDeSucces = $MonUser->getNom();
        header('location: ../../src/view/listeUser.php?succes=UserAdd&username=' .$MessageDeSucces);
//    } else {
//        header('location: ../../src/view/listeUser.php?error=token');
//    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['EditButton'])) {
    $_SESSION['idUser'] = (int)$_POST['EditButton'];
    header('location: ../../src/view/formUtilisateur.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['DeleteButton'])) {
    $DAOUser->deleteUser((int)$_POST['DeleteButton']);
    header('location: ../../src/view/listeUser.php?succes=UserDeleted');
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ModificationUser'])) {
    if(hash_equals($_SESSION['tokenModifAddUser'], $_POST['token']))
    {
        unset($_SESSION['tokenModifAddUser']);
        unset($_POST['token']);
        unset( $_SESSION['idUser']);
    // https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/7307123-gerez-vos-cas-derreur
    //Filtrage des données réceptionné par la requête.
    $filters = [
        'NomUser' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'PrenomUser' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'MotDePasse' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'Initiales' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'Email' => FILTER_VALIDATE_EMAIL,
        'Id' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ];

    //Ici on applique les filtres aux données reçues et on extrait ces données
    $sanitized_data = filter_input_array(INPUT_POST, $filters);

    //La fonction extract crée des variables PHP à partir des cléstableau qu'il nous est possible d'utiliser par la suite.
    //https://www.w3schools.com/php/func_array_extract.asp
    extract($sanitized_data, EXTR_SKIP);

    $MonUser->setNom($NomUser);
    $MonUser->setPrenom($PrenomUser);
    $MonUser->setMdp($MotDePasse);
    $MonUser->setInitiales($Initiales);
    $MonUser->setEmail($Email);
    $MonUser->setId($Id);


    $DAOUser->updateUser($MonUser);

    //Redirection
    $MessageDeSucces = $MonUser->getNom();
    header('location: ../../src/view/listeUser.php?succes=UserModifier&username=' .$MessageDeSucces);
    } else {
        header('location: ../../src/view/listeUser.php?error=token');
    }
}



