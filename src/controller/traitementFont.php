<?php
require_once("../../config/globalConfig.php");
require_once("../../config/localConfig.php");
use MonApp\model\DTO\Font;
use MonApp\model\DAO\DAOfont;

$DAOFont = new DAOfont();
$MaFont = new Font();



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['AddFont'])) {
    if(hash_equals($_SESSION['tokenAddFilm'], $_POST['token']))
    {
        //Filtrage des données réceptionné par la requête.
        $filters = [
            'NomPolice' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        ];

        //Ici on applique les filtres aux données reçues et on extrait ces données
        $sanitized_data = filter_input_array(INPUT_POST, $filters);
        //La fonction extract crée des variables PHP à partir des cléstableau qu'il nous est possible d'utiliser par la suite.
        //https://www.w3schools.com/php/func_array_extract.asp
        extract($sanitized_data, EXTR_SKIP);

        $MaFont->setNomFont($NomPolice);

        $DAOFont->insertFont($MaFont);
        //Redirection
        $NomFont = $MaFont->getNomFont();
        header('location: ../../src/view/listeFont.php?succes=FontAdd&Film=' .$NomFont);
    } else {
        header('location: ../../src/view/listeFont.php?error=token');
    }
}

//
//if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['EditButton'])) {
//    $_SESSION['idFilm'] = (int)$_POST['EditButton'];
//    header('location: ../../src/view/formEditFilm.php');
//}
//
//
//if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['UpdateMovie'])) {
//    if(hash_equals($_SESSION['tokenEditFilm'], $_POST['token']))
//    {
//        // https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/7307123-gerez-vos-cas-derreur
//        //Filtrage des données réceptionné par la requête.
//        $filters = [
//            'DateDebut' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//            'MatriculeFilm' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//            'NomFilm' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//            'Id' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//        ];
//
//        //Ici on applique les filtres aux données reçues et on extrait ces données
//        $sanitized_data = filter_input_array(INPUT_POST, $filters);
//
//        //La fonction extract crée des variables PHP à partir des cléstableau qu'il nous est possible d'utiliser par la suite.
//        //https://www.w3schools.com/php/func_array_extract.asp
//        extract($sanitized_data, EXTR_SKIP);
//
//        $MonFilm->setNom($DateDebut);
//        $MonFilm->setMatricule($MatriculeFilm);
//        $MonFilm->setNom($NomFilm);
//        $MonFilm->setId($Id);
//
//       $DAOFilm->updateFilm($MonFilm);
//
//        //Redirection
//        $nomdufilm = $MonFilm->getNom();
//        header('location: ../../src/view/listeFilm.php?succes=FilmUpdate&name=' .$MessageDeSucces);
//    } else {
//        header('location: ../../src/view/listeFilm.php?error=token');
//    }
//}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['DeleteButton'])) {
    $DAOFont->deleteFont((int)$_POST['DeleteButton']);
    header('location: ../../src/view/listeFont.php?succes=FontDeleted');
}