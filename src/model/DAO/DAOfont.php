<?php

namespace MonApp\model\DAO;
use MonApp\model\DTO\Font;
use MonApp\Utilities\BDD;
use PDO;

class DAOfont
{
    protected PDO $pdoObject;

    public function __construct() {
        $this->pdoObject = BDD::getBdd()->getConnect();
    }

    public function getAll(): ?array {
        $resultSet = NULL;
        $query = 'SELECT * FROM font';
        $rqtResult = $this->pdoObject->query($query);
        if ($rqtResult) {
            $rqtResult->setFetchMode(\PDO::FETCH_ASSOC);
            foreach ($rqtResult as $row) {
                $resultSet[] = new Font($row);
            }
        }
        return $resultSet;
    }

    public function insertFont(Font $font): ?Font {
        $resultSet = NULL;
        $query = "INSERT INTO
                  font (nomFont)
                  VALUES (:nomFont)";
        // On prépare la rêquete

        $reqPrep = $this->pdoObject->prepare($query);
        $res = $reqPrep->execute([
            'nomFont' => $font->getNomFont()]);

        if ($res !== FALSE) {
            //Si la requête s'est bien exécuté on récupère l'id généré en BDD et on met à jour l'id dans $entity
            $font->setIdFont($this->pdoObject->lastInsertId());
            $resultSet = $font;
        }
        return $resultSet;
    }

    public function getFontById(int $idFont): ?Font {
        $resultSet = NULL;
        $query = "SELECT * FROM font WHERE idFont = :idFont";

        $reqPrep = $this->pdoObject->prepare($query);
        $res = $reqPrep->execute(['idFont' => $idFont]);

        if ($res !== FALSE) {
            $row = ($tmp = $reqPrep->fetch(\PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $resultSet = new Font($row);
            }
        }
        return $resultSet;
    }


    public function deleteFont(int $id): bool {

        $query = "DELETE FROM font WHERE idFont = :idFont";
        $reqPrep = $this->pdoObject->prepare($query);
        $res = $reqPrep->execute(['idFont' => $id]);

        return $res !== false;
    }

}