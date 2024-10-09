<?php
namespace MonApp\model\DTO;
class TypeArtefact
{
    private ?int $id;
    private ?string $typeArtefact;

    /**
     * @param int|null $id
     * @param string|null $typeArtefact
     */
    public function __construct(?array $datas = null) {
        if (!is_null($datas)) {
            (isset($datas['id'])) ? $this->setId($datas['id']) : $this->id = null;
            (isset($datas['typeArtefact'])) ? $this->setTypeArtefact($datas['typeArtefact']) : $this->setTypeArtefact('');
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

    public function getTypeArtefact(): ?string
    {
        return $this->typeArtefact;
    }

    public function setTypeArtefact(?string $typeArtefact): void
    {
        $this->typeArtefact = $typeArtefact;
    }

}