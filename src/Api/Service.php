<?php

namespace MonApp\Api;

use MonApp\model\DTO\Utilisateur;
use MonApp\Utilities\Manager;
use MonApp\model\DAO\DAOutilisateur;
use Throwable;

class Service
{

    public function getAllUsers(?array $param = null): string {
        $json = '{}';
//          $repo = Manager::getRepository('Artefact');
            $repo = new DAOutilisateur();
            $res = $repo->getAll();

            if ($res !== null) {
                $json = json_encode($res, JSON_UNESCAPED_UNICODE);
            } else {
                $json = '{"msg":"Erreur, pas d\'artefact, la liste est vide"}';
            }
        return $json;
    }

    public function getUserById(?array $param = null): string {
        $json = '{}';

            $repo = new DAOutilisateur();
            $id = $param[0] ?? null;
            if ($id) {
                $res = $repo->getUserById($id);
                $json = json_encode($res, JSON_UNESCAPED_UNICODE);
            } else {
                $json = '{"msg":"Aucuuuunnn id de préciseé en params ...getUsersById/{id}"}';
            }
        return $json;
    }

    public function deleteUserById(?array $param = null): string {
        $json = '{}';

        $repo = new DAOutilisateur();
        $id = $param[0] ?? null;
        if ($id) {
            $res = $repo->deleteUser($id);
            $json = json_encode($res, JSON_UNESCAPED_UNICODE);
        } else {
            $json = '{"msg":"Aucuuuunnn id de préciseé en params ...deleteUserById/{id}"}';
        }
        return $json;
    }

    public function CreateUser(?array $param = null): string {
        $json = '{}';

        $repo = new DAOutilisateur();
        $user = new Utilisateur($param);
        $res = $repo->insertUser($user);
        if ($res) {
            $json = json_encode($res, JSON_UNESCAPED_UNICODE);
        } else {
            $json = '{"msg":"l\'ajout user à foirée tiens un exemple bouffon: "{
                        "id": 26,
                        "nom": "polo",
                        "prenom": "garcia",
                        "initiales": "tg",
                        "mdp": "polo",
                        "email": "ez@hotmail.fr"
                    }"}';
        }
        return $json;
    }

    public function UpdateUser(?array $param = null): string {
        $json = '{}';

        $repo = new DAOutilisateur();
        $user = new Utilisateur($param);
        $res = $repo->updateUser($user);
        if ($res) {
            $json = json_encode($res, JSON_UNESCAPED_UNICODE);
        } else {
            $json = '{"msg":"l\'ajout user à foirée tiens un exemple bouffon: "{
                        "id": 26,
                        "nom": "polo",
                        "prenom": "garcia",
                        "initiales": "tg",
                        "mdp": "polo",
                        "email": "ez@hotmail.fr"
                    }"}';
        }
        return $json;
    }

}