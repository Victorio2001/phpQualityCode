composer dump-autoload => pour actualiser/reload son composer.json
composer install => //


npm install -D tailwindcss => installation de tailwind
yarn tailwindcss init => configurer tailwind

// Créer le fichier ""/config/localConfig.php"
et mettre:
"
<?php
require_once 'globalConfig.php';

use MonApp\Utilities\BDD;


define('URL_BASE', "http://localhost/VictorioPriseEnMainPhpV.2");

if(!defined('DUMP')) {
    define('DUMP', true);
}
// Informations de connexion à la base de données
$infoBdd = array(
    'type' => 'mysql',
    'host' => 'localhost',
    'port' => 3306,
    'charset' => 'UTF8',
    'dbname' => 'motion',
    'user' => 'root',
    'pass' => ''
);
if (class_exists(BDD::class))
{
    BDD::$infoBdd = $infoBdd;
}
//
//function connectBdd(array $infoBdd): ?PDO {
//    $dsn = "mysql:dbname={$infoBdd['dbname']};host={$infoBdd['host']};port={$infoBdd['port']};charset={$infoBdd['charset']}";
//
//    try {
//        return new PDO($dsn, $infoBdd['user'], $infoBdd['pass']);
//    } catch (PDOException $e) {
//        echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
//        return null;
//    }
//}
//
//// Connexion à la base de données
//$dbConnection = connectBdd($infoBdd);

"

