<?php
require_once("../../config/globalConfig.php");
require_once("../../config/localConfig.php");
$tokenUserForm = bin2hex(random_bytes(15));
$faketoken = bin2hex(random_bytes(5));
$_SESSION['tokenUserConnect'] = $tokenUserForm;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Poc</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 800px;
            background-color: #f5f5f5;
        }
        .login-box {
            padding: 25px;
            background: #fff;
            width: 400px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2 class="text-center mb-4">Proof Of Concept FontDesign</h2>
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
        if ($error == 'MdpOuMailWrong') {
            echo ' <div class="alert alert-danger" role="alert">
                      Mot de passe ou Mail incorrect.
                   </div>';
        }
    }
    ?>
    <script>
        alert('faut lancer le fichier "../src/Test/InsertUser.php" pour génerer l\'user avec le mail "Mario@gmail.com" et commme mdp "Mario"')
    </script>
    <form method="post" action="../controller/TraitementConnect.php">
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">MotDePasse</label>
            <input type="password" class="form-control" id="password" name="mdp" required>
            <!--<input type="hidden" class="form-control" value="<?=$tokenUserForm?>" name="token" required>$faketoken-->
            <input type="hidden" class="form-control" value="<?=$faketoken?>" name="token" required>
        </div>
        <button type="submit" name="connectUtilisateur" class="btn btn-primary btn-block">S'identifier</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
