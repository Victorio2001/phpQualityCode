<?php

require_once("../../config/localConfig.php");
use MonApp\model\DTO\Utilisateur;
use MonApp\model\DAO\DAOutilisateur;

$DAOUser = new DAOutilisateur();
$MonUser = new Utilisateur();



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['connectUtilisateur'])) {
//    if(hash_equals($_SESSION['tokenUserConnect'], $_POST['token']))
//    {
        $filters = [
            'email' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'mdp' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        ];

        $sanitized_data = filter_input_array(INPUT_POST, $filters);
        extract($sanitized_data, EXTR_SKIP);

        $MonUser->setEmail($email);
        $MonUser->setMdp($mdp);

        $result = $DAOUser->getByEmailAndPassword($MonUser);
        if($result !== null){
            $_SESSION['userLog'] = $result;
            header('location: ../../src/view/listeUser.php');
        }else{
            header('location: ../../src/view/Connect.php?error=MdpOuMailWrong');
        }
//    } else {
//        var_dump("marche pas bouffon");
//        header('location: ../../src/view/ErrorPage.php?error=token');
//    }
}

