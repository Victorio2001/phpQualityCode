<?php
require_once("../../config/globalConfig.php");
require_once("../../config/localConfig.php");
$token = bin2hex(random_bytes(15));
$Faketoken = bin2hex(random_bytes(5));
$_SESSION['tokenAddFilm'] = $token;

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
    <h2 class="mb-4">Ajouter une police d'écriture</h2>

    <form method="POST" action="../controller/traitementFont.php">


        <div class="form-group">
            <label for="NomFilm">Nom Police:</label>
            <input type="text" class="form-control" id="NomPolice" name="NomPolice" required>
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" name="token" value="<?=$token?>" required>
            <!--<input type="hidden" class="form-control" name="token" value="<?=$Faketoken?>" required>-->
        </div>

        <button name="AddFont" type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js (for Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
