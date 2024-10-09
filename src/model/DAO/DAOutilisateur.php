<?php

namespace MonApp\model\DAO;
use MonApp\model\DTO\Utilisateur;
use MonApp\Utilities\BDD;
use PDO;

class DAOutilisateur
{
    protected PDO $pdoObject;
    private ?string $nomTable = null;

    public function __construct() {
        $this->pdoObject = BDD::getBdd()->getConnect();
        $this->nomTable = "utilisateur";
    }

    public function getAll(): ?array {
        $resultSet = NULL;
        $query = "SELECT * FROM {$this->nomTable};";
        $rqtResult = $this->pdoObject->query($query);
        if ($rqtResult) {
            $rqtResult->setFetchMode(\PDO::FETCH_ASSOC);
            foreach ($rqtResult as $row) {
                $resultSet[] = new Utilisateur($row);
            }
        }
        return $resultSet;
    }

    public function insertUser(Utilisateur $user): ?Utilisateur {
        $resultSet = NULL;
        $query = "INSERT INTO
                  {$this->nomTable} (nom, prenom, mdp, initiales, email)
                  VALUES (:nom, :prenom, :mdp, :initiales, :email)";
        // On prépare la rêquete
        $reqPrep = $this->pdoObject->prepare($query);
        $res = $reqPrep->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'mdp' => $user->getMdp(),
            'initiales' => $user->getInitiales(),
            'email' => $user->getEmail()]);

        if ($res !== FALSE) {
            //Si la requête s'est bien exécuté on récupère l'id généré en BDD et on met à jour l'id dans $entity
            $user->setId($this->pdoObject->lastInsertId());
            $resultSet = $user;
        }
        return $resultSet;
    }

    public function getUserById(int $id): ?Utilisateur {
        $resultSet = NULL;
        $query = "SELECT * FROM {$this->nomTable} WHERE id = :id";

        $reqPrep = $this->pdoObject->prepare($query);
        $res = $reqPrep->execute(['id' => $id]);

        if ($res !== FALSE) {
            $row = ($tmp = $reqPrep->fetch(\PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $resultSet = new Utilisateur($row);
            }
        }
        return $resultSet;
    }

    public function updateUser(Utilisateur $user): ?Utilisateur
    {
        $resultSet = null;
        // Entité existante
        $query = "UPDATE {$this->nomTable}"
            . " SET nom=:nom, "
            . " prenom=:prenom, "
            . " mdp=:mdp, "
            . " initiales=:initiales,"
            . " email=:email"
            . " WHERE id = :id";

        // On prépare la requête
        $reqPrep = $this->pdoObject->prepare($query);
        $res = $reqPrep->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'mdp' => $user->getMdp(),
            'initiales' => $user->getInitiales(),
            'email' => $user->getEmail(),
            'id' => $user->getId(),
        ]);

        if ($res !== false) {
            // Si la mise à jour s'est bien déroulée, on retourne l'entité mise à jour
            $resultSet = $user;
        }
        return $resultSet;
    }

    public function deleteUser(int $id): bool {
        $query = "DELETE FROM filmsutilisateurs WHERE idUtilisateur = :id";
        $reqPrep = $this->pdoObject->prepare($query);
        $reqPrep->execute(['id' => $id]);

        $query2 = "DELETE FROM {$this->nomTable} WHERE id = :id";
        $reqPrep = $this->pdoObject->prepare($query2);
        $res = $reqPrep->execute(['id' => $id]);

        return $res !== false;
    }

//    public static function getByEmailAndPassword($email, $password) {
//        $tableName = '`' . self::$tableName . '`';
//        $tableName = sprintf('`%s`', self::$tableName);
//
//        $sql = "SELECT * FROM $tableName WHERE `email` = ? AND `password` = ? LIMIT 1;";
//        $pst = DB::getInstance()->prepare($sql);
//        $pst->bindValue(1, $email, PDO::PARAM_STR);
//        $pst->bindValue(2, $password, PDO::PARAM_STR);
//        $pst->execute();
//
//        return $pst->fetch();
//    }

//    public function getByEmailAndPassword(Utilisateur $user){
//
//        $resultSet = NULL;
//        $query = "SELECT * FROM
//                  {$this->nomTable} WHERE `email` = :email AND `password` = :password ;";
//        $reqPrep = $this->pdoObject->prepare($query);
//        $res = $reqPrep->execute([
//            'email' => $user->getEmail(),
//            'password' => $user->getMdp()]);
//        if ($res !== FALSE) {
//            $row = $reqPrep->fetch(PDO::FETCH_ASSOC);
//            if ($row) {
//
//                $resultSet = new Utilisateur($row);
//            }
//        }
//        return $resultSet;
//
//    }

    public function getByEmailAndPassword(Utilisateur $user): ?Utilisateur
    {
        $resultSet = null;
        $query = "SELECT * FROM {$this->nomTable} WHERE `email` = :email";
        $reqPrep = $this->pdoObject->prepare($query);

        $res = $reqPrep->execute(['email' => $user->getEmail()]);

        if ($res !== false) {
            $row = $reqPrep->fetch(PDO::FETCH_ASSOC);

            if ($row && password_verify($user->getMdp(), $row['mdp'])) {
                $resultSet = new Utilisateur($row);
            }else{
                return null;
            }
        }
        return $resultSet;
    }
}