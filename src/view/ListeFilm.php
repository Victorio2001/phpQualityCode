<?php
require_once("../../config/localConfig.php");

$films = $_SESSION['Films'];
use MonApp\model\DAO\DAOfilm;
$repoFilm = new DAOfilm();
$listeFilms = $repoFilm->getAll();
$testGetById = $repoFilm->getFilmById(2);
//$deleteFilm = $repoFilm->deleteFilm(1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionMovies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
<?php include('../../public/inc/navbar.php'); ?>



<div class="container mt-5">

    <?php
    //https://getbootstrap.com/docs/4.0/components/alerts/
    //https://openclassrooms.com/forum/sujet/afficher-l-erreur-en-get
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error == 'token') {
            echo ' <div class="alert alert-danger" role="alert">
                      Erreur de token Film non Ajouté.
                   </div>';
        }
    }

    if (isset($_GET['succes'])) {
        $succes = $_GET['succes'];
        if ($succes == 'FilmAdd') {
            $NomDuFilm = $_GET['Film'];
            echo ' <div class="alert alert-success" role="alert">
                      le Film '.$NomDuFilm.' à bien été ajouté.
                   </div>';
        }

        if ($succes == 'FilmUpdate') {
            $NomDuFilm = $_GET['name'];
            echo ' <div class="alert alert-success" role="alert">
                      le Film '.$NomDuFilm.' à bien été modifié.
                   </div>';
        }

        if ($succes == 'FilmDeleted') {
            echo ' <div class="alert alert-success" role="alert">
              le Film à bien été supprimé.
           </div>';
        }
    }
    ?>


    <h2 class="mb-4">Liste Films (Utilisation des Sessions)</h2>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>Date de Début</th>
                <th>Matricule du film</th>
                <th>Nom du film</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($films as $film): ?>
                <tr>
                    <td><?php echo $film['DateDebut']; ?></td>
                    <td><?php echo $film['MatriculeFilm']; ?></td>
                    <td><?php echo $film['NomFilm']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <form class="mb-5" method="post" action="../controller/traitFilm.php">
        <button name="DeleteSessions">Vider la liste Utilisateur </button>
    </form>

    <h2 class="mb-4">Liste Films (Utilisation Bdd)</h2>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>DateDebut</th>
                <th>Matricule</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($listeFilms as $film): ?>
               <tr>
                   <td><?php echo $film->getId(); ?></td>
                   <td><?php echo $film->getNom(); ?></td>
                   <td><?php echo $film->getDateDebut("Y-m-d"); ?></td>
                   <td><?php echo $film->getMatricule(); ?></td>
                   <td>
                       <form method="post" action="../controller/traitementFilm.php">
                           <button name="EditButton" value="<?php echo $film->getId()?>" type="submit">Modifier</button>
                       </form>
                   </td>
                   <td>
                       <form method="post" action="../controller/traitementFilm.php">
                           <button name="DeleteButton" value="<?php echo $film->getId()?>" type="submit">Supprimer</button>
                       </form>
                   </td>
               </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

