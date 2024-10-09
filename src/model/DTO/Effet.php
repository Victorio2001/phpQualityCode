<?php
namespace MonApp\model\DTO;
class Effet
{
    private ?int $id;
    private ?string $intitule;

    /**
     * @param int|null $id
     * @param string|null $intitule
     */
    public function __construct(?array $datas = null) {
        if (!is_null($datas)) {
            (isset($datas['id'])) ? $this->setId($datas['id']) : $this->id = 0;
            (isset($datas['intitule'])) ? $this->setIntitule($datas['intitule']) : $this->setIntitule('');
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

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(?string $intitule): void
    {
        $this->intitule = $intitule;
    }


}