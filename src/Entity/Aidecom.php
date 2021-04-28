<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aidecom
 *
 * @ORM\Table(name="aidecom", indexes={@ORM\Index(name="id_sujet", columns={"id_sujet"})})
 * @ORM\Entity
 */
class Aidecom
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="commaintre", type="string", length=500, nullable=false)
     */
    private $commaintre;

    /**
     * @var int
     *
     * @ORM\Column(name="id_sujet", type="integer", nullable=false)
     */
    private $idSujet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommaintre(): ?string
    {
        return $this->commaintre;
    }

    public function setCommaintre(string $commaintre): self
    {
        $this->commaintre = $commaintre;

        return $this;
    }

    public function getIdSujet(): ?int
    {
        return $this->idSujet;
    }

    public function setIdSujet(int $idSujet): self
    {
        $this->idSujet = $idSujet;

        return $this;
    }


}
