<?php
//require_once("../../config/globalConfig.php");
//require_once("../../config/localConfig.php");
//
//
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    if (isset($_POST['submit'])) {
//
//        $filters = [
//            'NomFilm' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//            'MatriculeFilm' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//            'DateDebut' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//        ];
//
//        $sanitized_data = filter_input_array(INPUT_POST, $filters);
//
//        $NomFilm = $_POST['NomFilm'];
//        $MatriculeFilm = $_POST['MatriculeFilm'];
//        $DateDebut = $_POST['DateDebut'];
//
//        $mesFilms = [
//            'NomFilm' => $NomFilm,
//            'MatriculeFilm' => $MatriculeFilm,
//            'DateDebut' => $DateDebut];
//
//        if ( $mesFilms != null) {
//            $_SESSION['Films'] = $mesFilms;
//        }
//
//        header('location: ../../src/view/listeUser.php');
//
//    }
//}
//?>

<?php
require_once("../../config/globalConfig.php");
require_once("../../config/localConfig.php");



if (isset($_POST['caca'])) {
        $request = strtoupper(filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS));
        switch ($request) {
                case'POST':
                        $token = ($tmp = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_SPECIAL_CHARS)) ? $tmp : '';
                        if (!empty($_SESSION['token']) && $token !== '' && hash_equals($_SESSION['token'], $token)) {

                                $filters = [
                                    'NomFilm' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                                    'MatriculeFilm' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                                    'DateDebut' => [
                                        'filter' => FILTER_CALLBACK,
                                        'options' => function ($date, $format = 'Y-m-d') {
                                                try {
                                                        $d = DateTime::createFromFormat($format, $date);
                                                        return ($d && $d->format($format) == $date) ? $d->format($format) : false;
                                                } catch (DateMalformedStringException $e) {
                                                        $d = false;
                                                        return $d;
                                                }
                                        }
                                ]];

                                $sanitized_data = filter_input_array(INPUT_POST, $filters);
                                extract($sanitized_data, EXTR_SKIP);

                                $mesFilms = [
                                    'NomFilm' => $NomFilm,
                                    'MatriculeFilm' => $MatriculeFilm,
                                    'DateDebut' =>  $DateDebut,
                                ];

                                if (!empty($mesFilms)) {
                                        //session_start();
                                        $_SESSION['Films'][] = $mesFilms;
                                }
                                header('location: ../../src/view/ListeFilm.php');

                        }
                        break;
                default:
                // On est arrivé ici avec autre chose que POST...
                $url = URL_BASE . '../../src/view/ErrorPage.php';
                header("location: $url");
                break;
        }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['DeleteSessions'])) {
        session_destroy();
        header('location: ../../src/view/ListeFilm.php');
}
?>


