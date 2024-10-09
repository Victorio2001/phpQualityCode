<?php
namespace MonApp\model\DTO;
class Plan
{
    private ?int $id;
    private ?string $matricule;
    private ?int $numOrdre;
    private ?float $duree;
    private ?string $echelle;
    private ?string $description;
    private ?string $dialogues;
    private ?Film $Film;
    private ?Effet $Effet;

    /**
     * @param int|null $id
     * @param string|null $matricule
     * @param int|null $numOrdre
     * @param float|null $duree
     * @param string|null $echelle
     * @param string|null $description
     * @param string|null $dialogues
     * @param Film|null $Film
     * @param Effet|null $Effet
     */

    public function __construct(?array $datas = null) {
        if (!is_null($datas)) {
            (isset($datas['id'])) ? $this->setId($datas['id']) : $this->id = null;
            (isset($datas['matricule'])) ? $this->setMatricule($datas['matricule']) : $this->setMatricule('');
            (isset($datas['numOrdre'])) ? $this->setNumOrdre($datas['numOrdre']) : $this->setNumOrdre('');
            (isset($datas['duree'])) ? $this->setDuree($datas['duree']) : $this->setDuree('');
            (isset($datas['echelle'])) ? $this->setEchelle($datas['echelle']) : $this->setEchelle('');
            (isset($datas['description'])) ? $this->setDescription($datas['description']) : $this->setDescription('');
            (isset($datas['dialogues'])) ? $this->setDialogues($datas['dialogues']) : $this->setDialogues('');
            (isset($datas['Film'])) ? $this->setFilm($datas['Film']) : $this->setFilm(null);
            (isset($datas['Effet'])) ? $this->setEffet($datas['Effet']) : $this->setEffet(null);
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

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): void
    {
        $this->matricule = $matricule;
    }

    public function getNumOrdre(): ?int
    {
        return $this->numOrdre;
    }

    public function setNumOrdre(?int $numOrdre): void
    {
        $this->numOrdre = $numOrdre;
    }

    public function getDuree(): ?float
    {
        return $this->duree;
    }

    public function setDuree(?float $duree): void
    {
        $this->duree = $duree;
    }

    public function getEchelle(): ?string
    {
        return $this->echelle;
    }

    public function setEchelle(?string $echelle): void
    {
        $this->echelle = $echelle;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getDialogues(): ?string
    {
        return $this->dialogues;
    }

    public function setDialogues(?string $dialogues): void
    {
        $this->dialogues = $dialogues;
    }

    public function getFilm(): ?Film
    {
        return $this->Film;
    }

    public function setFilm(?Film $Film): void
    {
        $this->Film = $Film;
    }

    public function getEffet(): ?Effet
    {
        return $this->Effet;
    }

    public function setEffet(?Effet $Effet): void
    {
        $this->Effet = $Effet;
    }



}