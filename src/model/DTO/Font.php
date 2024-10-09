<?php

namespace MonApp\model\DTO;

class Font
{
    private ?int $idFont;
    private ?string $nomFont;

    /**
     * @param int|null $idFont
     * @param string|null $nomFont
     */
    public function __construct(?array $datas = null) {
        if (!is_null($datas)) {
            (isset($datas['idFont'])) ? $this->setIdFont($datas['idFont']) : $this->idFont = 0;
            (isset($datas['nomFont'])) ? $this->setNomFont($datas['nomFont']) : $this->setNomFont('');
        }
    }

    public function getIdFont(): ?int
    {
        return $this->idFont;
    }

    public function setIdFont(?int $idFont): void
    {
        $this->idFont = $idFont;
    }

    public function getNomFont(): ?string
    {
        return $this->nomFont;
    }

    public function setNomFont(?string $nomFont): void
    {
        $this->nomFont = $nomFont;
    }

}