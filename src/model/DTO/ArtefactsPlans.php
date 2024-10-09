<?php
namespace MonApp\model\DTO;
class ArtefactsPlans
{
    //$variable = null
    private ?Artefact $Artefact = null;
    private ?Plan $Plan;

    /**
     * @param Artefact|null $Artefact
     * @param Plan|null $Plan
     */
    public function __construct(?array $datas = null) {
        if (!is_null($datas)) {
            (isset($datas['Artefact'])) ? $this->setArtefact($datas['Artefact']) : $this->setArtefact(null);
            (isset($datas['Plan'])) ? $this->setPlan($datas['Plan']) : $this->setPlan(null);
        }
    }

    public function getArtefact(): ?Artefact
    {
        return $this->Artefact;
    }

    public function setArtefact(?Artefact $Artefact): void
    {
        $this->Artefact = $Artefact;
    }

    public function getPlan(): ?Plan
    {
        return $this->Plan;
    }

    public function setPlan(?Plan $Plan): void
    {
        $this->Plan = $Plan;
    }

}