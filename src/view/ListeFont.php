<?php
require_once("../../config/localConfig.php");

//$films = $_SESSION['Films'];
use MonApp\model\DAO\DAOfont;
$repoFont = new DAOfont();
$listeFonts = $repoFont->getAll();
//$testGetById = $listeFonts->getFilmById(2);
//$deleteFilm = $repoFilm->deleteFilm(1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poc</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
<?php include('../../public/inc/navbar.php'); ?>

<div class="container mt-5">

<!--    --><?php
//    //https://getbootstrap.com/docs/4.0/components/alerts/
//    //https://openclassrooms.com/forum/sujet/afficher-l-erreur-en-get
//    if (isset($_GET['error'])) {
//        $error = $_GET['error'];
//        if ($error == 'token') {
//            echo ' <div class="alert alert-danger" role="alert">
//                      Erreur de token Font non Ajouté.
//                   </div>';
//        }
//    }
//
//    if (isset($_GET['succes'])) {
//        $succes = $_GET['succes'];
//        if ($succes == 'FilmAdd') {
//            $NomDuFilm = $_GET['Film'];
//            echo ' <div class="alert alert-success" role="alert">
//                      la Font '.$NomDuFilm.' à bien été ajouté.
//                   </div>';
//        }
//
//        if ($succes == 'FilmUpdate') {
//            $NomDuFilm = $_GET['name'];
//            echo ' <div class="alert alert-success" role="alert">
//                      le Film '.$NomDuFilm.' à bien été modifié.
//                   </div>';
//        }
//
//        if ($succes == 'FilmDeleted') {
//            echo ' <div class="alert alert-success" role="alert">
//              le Film à bien été supprimé.
//           </div>';
//        }
//    }
//    ?>



    <div class="row">
        <div class="d-flex justify-content-center">
                <div class="card">
                    <div class="card-header">
                        [Nom de la police super cool]
                    </div>
                    <div class="card-body "> <!-- bg-light  -->
                        <blockquote class="blockquote mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </blockquote>

                        <div class="d-flex justify-content-start mt-3">
                            <form method="post" action="../controller/#">
                                <a class="btn btn-light mr-2" href="#"><img style="width: 30px" src="../../public/img/italique.png" class="img-fluid" alt="Responsive image"></a>
                            </form>
                            <form method="post" action="../controller/#">
                                <a class="btn btn-light mr-2" href="#"><img style="width: 30px" src="../../public/img/souligner.png" class="img-fluid" alt="Responsive image"></a>
                            </form>
                            <form method="post" action="../controller/#">
                                <a class="btn btn-light" href="#"><img style="width: 30px" src="../../public/img/gras.png" class="img-fluid" alt="Responsive image"></a>
                            </form>
                        </div>
                    </div>
                </div>

            <div class="col-8">
                <h4 class="mb-4"><?php echo count($listeFonts)?> Font(s) disponibles</h4>
                <input class="form-control mb-2">

                <?php foreach ($listeFonts as $film): ?>

                    <div class="card">
                        <div class="card-header">
                            <?php echo $film->getNomFont(); ?>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>

                            <div class="d-flex justify-content-start">
                                <form method="post" action="../controller/#">
                                    <button class="btn btn-danger mr-2" name="DeleteButton" value="<?php echo $film->getIdFont()?>" type="submit">Supprimer</button>
                                </form>
                                <form method="post" action="../controller/#">
                                    <button class="btn btn-light" name="EditButton" value="<?php echo $film->getIdFont()?>" type="submit">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>






</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

