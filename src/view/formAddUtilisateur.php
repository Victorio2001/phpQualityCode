<?php
require_once("../../config/globalConfig.php");
require_once("../../config/localConfig.php");
$token = bin2hex(random_bytes(15));
$_SESSION['tokenAddUser'] = $token;

$tokenfake = bin2hex(random_bytes(10));
$_SESSION['FakeToken'] = $tokenfake
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionMovies</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<?php include('../../public/inc/navbar.php'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Ajout d'un Utilisateur</h2>

    <form method="post" action="../controller/traitementUser.php">
        <div class="form-group">
            <label for="NomUser">NomUser:</label>
            <input type="text" class="form-control" id="NomUser" name="NomUser" required>
        </div>

        <div class="form-group">
            <label for="PrenomUser">PrenomUser:</label>
            <input type="text" class="form-control" id="PrenomUser" name="PrenomUser" required>
        </div>

        <div class="form-group">
            <label for="MotDePasse">MotDePasse:</label>
            <input type="text" class="form-control" id="MotDePasse" name="MotDePasse" required>
        </div>

        <div class="form-group">
            <label for="Initiales">Initiales:</label>
            <input type="text" class="form-control" id="Initiales" name="Initiales" required>
        </div>

        <div class="form-group">
            <label for="Email">Email:</label>
            <input type="text" class="form-control" id="Email" name="Email" required>
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" name="token" value="<?=$token?>" required>
            <!--<input type="hidden" class="form-control" name="token" value="<?=$tokenfake?>" required> -->
        </div>

        <button type="submit" name="AddUtilisateur" class="btn btn-primary">Valider les changements</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js (for Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>