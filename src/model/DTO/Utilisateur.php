<?php
namespace MonApp\model\DTO;
class Utilisateur implements \JsonSerializable
{
    private ?int $id = null;
    private ?string $nom;
    private ?string $prenom;
    private ?string $mdp;
    private ?string $initiales;
    private ?string $email;

    /**
     * @param int|null $id
     * @param string|null $nom
     * @param string|null $prenom
     * @param string|null $mdp
     * @param string|null $initiales
     * @param string|null $email
     *
     */
    //lE CONSTRUCTEUR SERT A INSTANCIER/CREER UN NOUVEL OBJET.
    public function __construct(?array $datas = null) {
        if (!is_null($datas)) {
            (isset($datas['id'])) ? $this->setId($datas['id']) : $this->id = null;
            (isset($datas['nom'])) ? $this->setNom($datas['nom']) : $this->setNom('null');
            (isset($datas['prenom'])) ? $this->setPrenom($datas['prenom']) : $this->setPrenom('ChampProblématique');
            (isset($datas['mdp'])) ? $this->setMdp($datas['mdp']) : $this->setMdp('ChampProblématique');
            (isset($datas['initiales'])) ? $this->setInitiales($datas['initiales']) : $this->setInitiales('ChampProblématique');
            (isset($datas['email'])) ? $this->setEmail($datas['email']) : $this->setEmail('ChampProblématique');
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        if (is_null($nom)) {
            throw new \InvalidArgumentException("Le nom ne peut pas être null.");
        }
        if (preg_match('/\d/', $nom)) {
            throw new \InvalidArgumentException("Le nom doit pas contenir des chiffres.");
        }
        if (preg_match('/\W/', $nom)) {
            throw new \InvalidArgumentException("Le nom doit pas doit contenir des caractères spéciaux.");
        }
        if (strlen($nom) > 20) {
            throw new \LengthException("Le nom est trop long, il ne doit pas dépasser les 25 caractères.");
        }
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        if (is_null($prenom)) {
            throw new \InvalidArgumentException("Le prenom ne peut pas être null.");
        }
        if (strlen($prenom) > 25) {
            throw new \LengthException("Le prenom est trop long, il ne doit pas dépasser les 25 caractères.");
        }
        if (preg_match('/\d/', $prenom)) {
            throw new \InvalidArgumentException("Le prenom doit pas contenir des chiffres.");
        }
        if (preg_match('/\W/', $prenom)) {
            throw new \InvalidArgumentException("Le prenom doit pas doit contenir des caractères spéciaux.");
        }
        $this->prenom = $prenom;
        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(?string $mdp): static
    {
        //https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/7307123-gerez-vos-cas-derreur
        //https://www.codexworld.com/how-to/validate-password-strength-in-php/
        //https://www.zendevs.xyz/les-expressions-regulieres-en-php-regex/
        //Vérification si majuscule, minuscule, nombre, caractère spécial.

       /* if (!preg_match('/[A-Z]/', $mdp)) {
            throw new \InvalidArgumentException("Le Mot De Passe doit contenir des majuscules.");
        }
        if (!preg_match('/[a-z]/', $mdp)) {
            throw new \InvalidArgumentException("Le Mot De Passe doit contenir des minuscules.");
        }
        if (!preg_match('/\d/', $mdp)) {
            throw new \InvalidArgumentException("Le Mot De Passe doit contenir des chiffres.");
        }
        if (!preg_match('/\W/', $mdp)) {
            throw new \InvalidArgumentException("Le Mot De Passe doit contenir des caractères spéciaux.");
        }
        if (is_null($mdp)) {
            throw new \InvalidArgumentException("Le Mot De Passe ne peut pas être null.");
        }
        if (strlen($mdp) < 12) {
            throw new \LengthException("Le Mot De Passe est trop Court, il doit dépasser les 12 caractères, il en fait"." ".strlen($mdp));
        }*/
        $this->mdp = $mdp;
        return $this;
    }

    public function getInitiales(): ?string
    {
        return $this->initiales;
    }

    public function setInitiales(?string $initiales): static
    {
        if (is_null($initiales)) {
            throw new \InvalidArgumentException("Les initiaux ne peuvent pas être null.");
        }
        if (strlen($initiales) > 25) {
            throw new \LengthException("Les initiaux sont trop long, il ne doit pas dépasser les 25 caractères.");
        }
        if (preg_match('/\d/', $initiales)) {
            throw new \InvalidArgumentException("Les initiaux ne doivent pas contenir des chiffres.");
        }
        if (preg_match('/\W/', $initiales)) {
            throw new \InvalidArgumentException("Les initiaux ne doivent pas doit contenir des caractères spéciaux.");
        }
        $this->initiales = $initiales;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        if (is_null($email)) {
            throw new \InvalidArgumentException("L'email ne peut pas être null.");
        }
        if (strlen($email) > 50) {
            throw new \LengthException("L'email est trop long, il ne doit pas dépasser les 50 caractères.");
        }
        $this->email = $email;
        return $this;
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->getId(),
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom(),
            'initiales' => $this->getInitiales(),
            'mdp' => $this->getNom(),
            'email' => $this->getEmail(),
            ];
    }

    public function __toString() {
        $str = "Utilisateur: ";
        $str .= "id: " . $this->idToString() . ", ";
        $str .= "nom: " . $this->nomToString() . ", ";
        $str .= "prenom: " . $this->prenomToString() . ", ";
        $str .= "initiales: " . $this->initialesToString() . ", ";
        $str .= "email: " . $this->emailToString();
        // Le mot de passe n'est pas inclus pour des raisons de sécurité
        return $str;
    }

    private function idToString(): int|string|null
    {
        return $this->id !== null ? $this->id : "Non défini";
    }

    private function nomToString(): ?string
    {
        return $this->nom !== null ? $this->nom : "Non défini";
    }

    private function prenomToString(): ?string
    {
        return $this->prenom !== null ? $this->prenom : "Non défini";
    }

    private function initialesToString(): ?string
    {
        return $this->initiales !== null ? $this->initiales : "Non défini";
    }

    private function emailToString(): ?string
    {
        return $this->email !== null ? $this->email : "Non défini";
    }


}