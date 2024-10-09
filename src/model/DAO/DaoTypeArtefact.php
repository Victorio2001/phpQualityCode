<?php

namespace MonApp\model\DAO;
use MonApp\model\DTO\TypeArtefact;
use MonApp\Utilities\BDD;
use PDO;

class DaoTypeArtefact
{
    protected PDO $pdoObject;
    private ?string $nomTable = null;

    public function __construct() {
        $this->pdoObject = BDD::getBdd()->getConnect();
        $this->nomTable = "typeartefact";
    }

    public function getTypeArtefactById(int $id): ?TypeArtefact {
        $resultSet = NULL;
        $query = "SELECT * FROM {$this->nomTable} WHERE id = :id";

        $reqPrep = $this->pdoObject->prepare($query);
        $res = $reqPrep->execute(['id' => $id]);

        if ($res !== FALSE) {
            $row = ($tmp = $reqPrep->fetch(\PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $resultSet = new TypeArtefact($row);
            }
        }
        return $resultSet;
    }
}