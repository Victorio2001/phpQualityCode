<?php
require_once("../../config/globalConfig.php");
require_once("../../config/localConfig.php");
use MonApp\model\DAO\DAOfilm;
$token = bin2hex(random_bytes(15));
$Faketoken = bin2hex(random_bytes(5));
$_SESSION['tokenEditFilm'] = $token;


$DAOFilm = new DAOfilm();
$MonFilm = $DAOFilm->getFilmById((int)$_SESSION['idFilm']);
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
    <h2 class="mb-4">EditFilmBdd => "<?php echo $MonFilm->getNom(); ?>"</h2>

    <form method="POST" action="../controller/traitementFilm.php">


        <div class="form-group">
            <label for="NomFilm">Nom Film:</label>
            <input type="text" value="<?php echo $MonFilm->getNom() ?>" class="form-control" id="NomFilm" name="NomFilm" required>
        </div>

        <div class="form-group">
            <label for="MatriculeFilm">Matricule Film:</label>
            <input type="text" value="<?php echo $MonFilm->getMatricule() ?>" class="form-control" id="MatriculeFilm" name="MatriculeFilm" required>
        </div>

        <div class="form-group">
            <label for="DateDebut">DateDebut Film:</label>
            <input type="date" value="<?php echo $MonFilm->getDateDebut("Y-m-d") ?>" class="form-control" id="DateDebut" name="DateDebut" required>
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" value="<?php echo $MonFilm->getId()?>" id="id" name="Id" required>
            <input type="hidden" class="form-control" name="token" value="<?=$token?>" required>
            <!--<input type="hidden" class="form-control" name="token" value="<?=$Faketoken?>" required>-->
        </div>

        <button name="UpdateMovie" type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js (for Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
