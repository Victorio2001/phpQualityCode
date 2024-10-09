<?php
namespace MonApp\model\DTO;
class Artefact
{
    private ?int $id;
    private ?string $description;
    private ?string $matricule;
    private ?TypeArtefact $TypeArtefact;

    /**
     * @param int|null $id
     * @param string|null $description
     * @param string|null $matricule
     * @param TypeArtefact|null $TypeArtefact
     */
    public function __construct(?array $datas = null) {
        if (!is_null($datas)) {
            (isset($datas['namespace MonApp\model\DTO;'])) ? $this->setId($datas['id']) : $this->id = null;
            (isset($datas['description'])) ? $this->setDescription($datas['description']) : $this->setDescription('');
            (isset($datas['matricule'])) ? $this->setMatricule($datas['matricule']) : $this->setMatricule('');
            (isset($datas['TypeArtefact'])) ? $this->setTypeArtefact($datas['TypeArtefact']) : $this->setTypeArtefact(null);
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): void
    {
        $this->matricule = $matricule;
    }

    public function getTypeArtefact(): ?TypeArtefact
    {
        return $this->TypeArtefact;
    }

    public function setTypeArtefact(?TypeArtefact $TypeArtefact): void
    {
        $this->TypeArtefact = $TypeArtefact;
    }

}