<?php
require_once("../../config/globalConfig.php");
require_once("../../config/localConfig.php");
require_once("../../config/globalConfig.php");
require_once("../../config/localConfig.php");
use MonApp\model\DAO\DAOutilisateur;

$token = bin2hex(random_bytes(15));
$_SESSION['tokenModifAddUser'] = $token;

$Monutilisateur = null;

if (isset($_SESSION['idUser'])) {
    $DAOuser = new DAOutilisateur();
    $Monutilisateur = $DAOuser->getUserById((int)$_SESSION['idUser']);
}


$afficherModif = false;
$afficherAddUser = false;
$EditCheck = isset($Monutilisateur);
$checkVerification = $EditCheck ? !$afficherModif : $afficherModif;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poc</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<?php include('../../public/inc/navbar.php'); ?>

<div class="container mt-5">
    <h2 class="mb-4"><?php echo !$afficherModif && $Monutilisateur !== null ? "Modification Utilisateur =>".$Monutilisateur->getNom()." ".$Monutilisateur->getPrenom() : "Ajouter Votre Utilisateur"; ?></h2>

    <form method="post" action="../controller/traitementUser.php">
        <div class="form-group">
            <label for="NomUser">NomUser:</label>
            <input type="text" class="form-control" value="<?php echo !$afficherModif && $Monutilisateur !== null ? $Monutilisateur->getNom(): ""; ?>" id="NomUser" name="NomUser" required>
        </div>

        <div class="form-group">
            <label for="PrenomUser">PrenomUser:</label>
            <input type="text" class="form-control" value="<?php echo !$afficherModif && $Monutilisateur !== null ? $Monutilisateur->getPrenom(): ""; ?>" id="PrenomUser" name="PrenomUser" required>
        </div>

        <div class="form-group">
            <label for="MotDePasse">MotDePasse:</label>
            <input type="text" class="form-control" value="<?php echo !$afficherModif && $Monutilisateur !== null? $Monutilisateur->getMdp(): ""; ?>" id="MotDePasse" name="MotDePasse" required>
        </div>

        <div class="form-group">
            <label for="Initiales">Initiales:</label>
            <input type="text" class="form-control" value="<?php echo !$afficherModif && $Monutilisateur !== null ? $Monutilisateur->getInitiales(): ""; ?>" id="Initiales" name="Initiales" required>
        </div>

        <div class="form-group">
            <label for="Email">Email:</label>
            <input type="text" class="form-control" value="<?php echo !$afficherModif && $Monutilisateur !== null ? $Monutilisateur->getEmail(): ""; ?>" id="Email" name="Email" required>
        </div>
            <input type="hidden" class="form-control" value="<?php echo !$afficherModif && $Monutilisateur !== null ? $Monutilisateur->getId(): ""; ?>" id="id" name="Id" required>
            <input type="hidden" class="form-control" value="<?=$token?>" id="id" name="token" required>


        <button type="submit" name="<?php echo !$afficherModif && $Monutilisateur !== null ? "ModificationUser": "AddUtilisateur"; ?>" class="btn btn-primary"><?php echo !$afficherModif && $Monutilisateur !== null ? "Modifier user": "Ajouter user"; ?></button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
