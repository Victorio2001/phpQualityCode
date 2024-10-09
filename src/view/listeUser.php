<?php

use MonApp\model\DAO\DAOutilisateur;
require_once("../../config/localConfig.php");

$repoUsers = new DAOutilisateur();
$users = $repoUsers->getAll();
$UserById = $repoUsers->getUserById(1);
$MonutilisateurLog = $_SESSION['userLog'];

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
        <h2 class="mb-4">Liste Utilisateurs</h2>
        <?php
        //https://getbootstrap.com/docs/4.0/components/alerts/
        //https://openclassrooms.com/forum/sujet/afficher-l-erreur-en-get
        if (isset($_GET['error'])) {
        $error = $_GET['error'];
            if ($error == 'token') {
            echo ' <div class="alert alert-danger" role="alert">
                      Erreur de token l\'utilisateur n\'a pas été ajoutée.
                   </div>';
            }
        }
        if (isset($_GET['succes'])) {
            $succes = $_GET['succes'];
            if ($succes == 'UserAdd') {
                $NomUserAdd = $_GET['username'];
                echo ' <div class="alert alert-success" role="alert">
                      l\'utilisateur '.$NomUserAdd.' à bien été ajouté.
                   </div>';
            }
            if ($succes == 'UserModifier') {
                $NomUserAdd = $_GET['username'];
                echo ' <div class="alert alert-success" role="alert">
                      l\'utilisateur "<strong>'.$NomUserAdd.'</strong>" à bien été modifié.
                   </div>';
            }
            if ($succes == 'UserDeleted') {
                echo ' <div class="alert alert-success" role="alert">
                      l\'utilisateur à bien été supprimé.
                   </div>';
            }

        }
        ?>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>mdp</th>
                    <th>initiales</th>
                    <th>email</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user->getId(); ?></td>
                        <td><?php echo $user->getNom(); ?></td>
                        <td><?php echo $user->getPrenom(); ?></td>
                        <td><?php echo $user->getMdp(); ?></td>
                        <td><?php echo $user->getInitiales(); ?></td>
                        <td><?php echo $user->getEmail(); ?></td>
                        <td>
                            <form method="post" action="../controller/traitementUser.php">
                                <button name="EditButton" value="<?php echo $user->getId()?>" type="submit">Modifier</button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="../controller/traitementUser.php">
                                <button name="DeleteButton" value="<?php echo $user->getId()?>" type="submit">Supprimer</button>
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

