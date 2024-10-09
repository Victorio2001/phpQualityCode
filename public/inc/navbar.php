<?php
require_once("../../config/localConfig.php");
$MonutilisateurLog = $_SESSION['userLog'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Proof Of Concept -- FontDesign</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item dropdown ml-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gestion Utilisateurs
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../../src/view/formUtilisateur.php">Ajouter Utilisateur</a>
                    <a class="dropdown-item" href="../../src/view/listeUser.php">Liste Utilisateurs</a>
                </div>
            </li>

            <li class="nav-item dropdown ml-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Catalogue Police d’écriture
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../../src/view/formAddFont.php">Ajouter Font</a>
                    <a class="dropdown-item" href="../../src/view/ListeFont.php">Liste Fonts</a>
                </div>
            </li>

<!--            <li class="nav-item dropdown ml-2">-->
<!--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                    Film [Session-Bdd]-->
<!--                </a>-->
<!--                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->
<!--                    <a class="dropdown-item" href="../../src/view/formAddFilmSession.php">Ajouter Film [Sessions]</a>-->
<!--                    <a class="dropdown-item" href="../../src/view/formAddFilm.php">Ajouter Film [BDD]</a>-->
<!--                    <a class="dropdown-item" href="../../src/view/ListeFilm.php">Liste Films</a>-->
<!--                </div>-->
<!--            </li>-->

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Utilisateur: <strong><?php  echo $MonutilisateurLog->getNom() ?></strong>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="">Votre profil</a>
                    <a class="dropdown-item" href="../../src/controller/Destroy.php">Déconnexion</a>
                </div>
            </li>
        </ul>
    </div>
</nav>