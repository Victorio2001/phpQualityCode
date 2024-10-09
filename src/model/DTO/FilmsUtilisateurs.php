<?php
namespace MonApp\model\DTO;
class FilmsUtilisateurs
{
    private ?Utilisateur $Utilisateur;
    private ?Film $Film;

    /**
     * @param int|null $Utilisateur
     * @param Film|null $Film
     */
    public function __construct(?array $datas = null) {
        if (!is_null($datas)) {
            (isset($datas['Film'])) ? $this->setFilm($datas['Film']) : $this->setFilm(null);
            (isset($datas['Utilisateur'])) ? $this->setUtilisateur($datas['Utilisateur']) : $this->setUtilisateur(null);
        }
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(?Utilisateur $Utilisateur): void
    {
        $this->Utilisateur = $Utilisateur;
    }

    public function getFilm(): ?Film
    {
        return $this->Film;
    }

    public function setFilm(?Film $Film): void
    {
        $this->Film = $Film;
    }

}