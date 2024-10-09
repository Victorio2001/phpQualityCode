<?php

namespace MonApp\model\DAO;
use MonApp\model\DTO\Film;
use MonApp\Utilities\BDD;
use PDO;

class DAOfilm
{
    protected PDO $pdoObject;

    public function __construct() {
        $this->pdoObject = BDD::getBdd()->getConnect();
    }

    public function getAll(): ?array {
        $resultSet = NULL;
        $query = 'SELECT * FROM film';
        $rqtResult = $this->pdoObject->query($query);
        if ($rqtResult) {
            $rqtResult->setFetchMode(\PDO::FETCH_ASSOC);
            foreach ($rqtResult as $row) {
                $resultSet[] = new Film($row);
            }
        }
        return $resultSet;
    }

    public function insertFilm(Film $film): ?Film {
        $resultSet = NULL;
        $query = "INSERT INTO
                  film (nom, dateDebut, matricule)
                  VALUES (:nom, :dateDebut, :matricule)";
        // On prépare la rêquete

        $reqPrep = $this->pdoObject->prepare($query);
        $res = $reqPrep->execute([
            'nom' => $film->getNom(),
            'dateDebut' => $film->getDateDebut("Y-m-d"),
            'matricule' => $film->getMatricule()]);

        if ($res !== FALSE) {
            //Si la requête s'est bien exécuté on récupère l'id généré en BDD et on met à jour l'id dans $entity
            $film->setId($this->pdoObject->lastInsertId());
            $resultSet = $film;
        }
        return $resultSet;
    }

    public function getFilmById(int $id): ?Film {
        $resultSet = NULL;
        $query = "SELECT * FROM film WHERE id = :id";

        $reqPrep = $this->pdoObject->prepare($query);
        $res = $reqPrep->execute(['id' => $id]);

        if ($res !== FALSE) {
            $row = ($tmp = $reqPrep->fetch(\PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $resultSet = new Film($row);
            }
        }
        return $resultSet;
    }

    public function updateFilm(Film $film): ?Film
    {

        $resultSet = null;
        // Entité existante
        $query = "UPDATE film"
            . " SET nom=:nom, "
            . " dateDebut=:dateDebut, "
            . " matricule=:matricule "
            . " WHERE id = :id";

        // On prépare la requête
        $reqPrep = $this->pdoObject->prepare($query);
        $res = $reqPrep->execute([
            'nom' => $film->getNom(),
            'dateDebut' => $film->getDateDebut("Y-m-d"),
            'matricule' => $film->getMatricule(),
            'id' => $film->getId(),
        ]);

        if ($res !== false) {
            // Si la mise à jour s'est bien déroulée, on retourne l'entité mise à jour
            $resultSet = $film;
        }
        return $resultSet;
    }

    public function deleteFilm(int $id): bool {

        //Supprimer la clef de la table originel en lasstttttt.
        $query = "DELETE FROM filmsutilisateurs WHERE idFilm = :id";
        $reqPrep = $this->pdoObject->prepare($query);
        $reqPrep->execute(['id' => $id]);

        $query2 = "DELETE FROM plan WHERE idFilm = :id";
        $reqPrep = $this->pdoObject->prepare($query2);
        $res = $reqPrep->execute(['id' => $id]);

        $query3 = "DELETE FROM film WHERE id = :id";
        $reqPrep = $this->pdoObject->prepare($query3);
        $res = $reqPrep->execute(['id' => $id]);

        return $res !== false;
    }

}