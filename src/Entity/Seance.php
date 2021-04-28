<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seance
 *
 * @ORM\Table(name="seance", indexes={@ORM\Index(name="id_formation", columns={"ID_formation"})})
 * @ORM\Entity
 */
class Seance
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_seance", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSeance;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_formation", type="integer", nullable=false)
     */
    private $idFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=1024, nullable=false)
     */
    private $lien;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1024, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Date_seance", type="string", length=255, nullable=false)
     */
    private $dateSeance;

    public function getIdSeance(): ?int
    {
        return $this->idSeance;
    }

    public function getIdFormation(): ?int
    {
        return $this->idFormation;
    }

    public function setIdFormation(int $idFormation): self
    {
        $this->idFormation = $idFormation;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateSeance(): ?string
    {
        return $this->dateSeance;
    }

    public function setDateSeance(string $dateSeance): self
    {
        $this->dateSeance = $dateSeance;

        return $this;
    }


}
