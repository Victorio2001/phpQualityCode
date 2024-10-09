<?php
namespace MonApp\model\DTO;

class Film implements \JsonSerializable
{
    protected ?int $id = null;
    protected string $nom;
    protected string $matricule;
    protected \DateTime $dateDebut;

    public function __construct(?array $datas = null) {
        (isset($datas['id'])) ? $this->setId($datas['id']) : null;
        (isset($datas['nom'])) ? $this->setNom($datas['nom']) : $this->setNom('Not defined');
        (isset($datas['matricule'])) ? $this->setMatricule($datas['matricule']) : $this->setMatricule('_');
        (isset($datas['dateDebut'])) ? $this->setDateDebut($datas['dateDebut']) : $this->setDateDebut(null);
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getMatricule(): string {
        return $this->matricule;
    }



    public function setId(?int $id) : static {
        $this->id = (is_null($this->id)) ? $id : $this->id;
        return $this;
    }

    public function setNom(string $nom) : static {
        $this->nom = $nom;
        return $this;
    }

    public function setMatricule(string $matricule) : static {
        $this->matricule = $matricule;
        return $this;
    }
    public function getDateDebut(string|null $format=null): string|\DateTime {
        return (is_null($format))?$this->dateDebut:$this->dateDebut->format($format);
    }
    public function setDateDebut(\DateTime|string|null $dateDebut = null) : static {
        if (is_null($dateDebut)) {
            $this->dateDebut = new \DateTime();
        } else if(is_string($dateDebut)) {
            $this->dateDebut = new \DateTime($dateDebut);
        } else {
            $this->dateDebut = $dateDebut;
        }
        return $this;
    }


    public function jsonSerialize(): array {
        return [
            'id' => $this->getId(),
            'nom' => $this->getNom(),
            'matricule' => $this->getMatricule(),
            'dateDebut' => $this->getDateDebut()];
    }


}