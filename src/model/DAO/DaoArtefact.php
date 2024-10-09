<?php
namespace MonApp\model\DAO;
use PDO;
Use MonApp\model\DTO\Artefact;
use MonApp\model\DAO\DaoTypeArtefact;
use MonApp\Utilities\BDD;

class DaoArtefact
{
    protected PDO $pdoObject;
    private ?string $nomTable = null;

    public function __construct() {
        $this->pdoObject = BDD::getBdd()->getConnect();
        $this->nomTable = "artefact";

    }

    public function getAll(): ?array {
        $resultSet = NULL;
        $query = "SELECT * FROM {$this->nomTable};";
        $rqtResult = $this->pdoObject->query($query);
        if ($rqtResult) {
            $rqtResult->setFetchMode(\PDO::FETCH_ASSOC);
            foreach ($rqtResult as $row) {
                $typeArtefact = (new DaoTypeArtefact())->getTypeArtefactById($row['idTypeArtefact']);
                var_dump($typeArtefact);
//                $row['TypeArtefact'] = $typeArtefact;
//                $resultSet[] = new Artefact($row);
            }
        }
        return $resultSet;
    }
}