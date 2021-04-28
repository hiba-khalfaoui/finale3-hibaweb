<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription", indexes={@ORM\Index(name="id_formation", columns={"formation_id"}), @ORM\Index(name="id_apprenant", columns={"utilisateur_id"})})
 * @ORM\Entity
 */
class Inscription
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
     * @var int|null
     *
     * @ORM\Column(name="utilisateur_id", type="integer", nullable=true)
     */
    private $utilisateurId;

    /**
     * @var int
     *
     * @ORM\Column(name="formation_id", type="integer", nullable=false)
     */
    private $formationId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscrit", type="date", nullable=false)
     */
    private $dateInscrit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateurId(): ?int
    {
        return $this->utilisateurId;
    }

    public function setUtilisateurId(?int $utilisateurId): self
    {
        $this->utilisateurId = $utilisateurId;

        return $this;
    }

    public function getFormationId(): ?int
    {
        return $this->formationId;
    }

    public function setFormationId(int $formationId): self
    {
        $this->formationId = $formationId;

        return $this;
    }

    public function getDateInscrit(): ?\DateTimeInterface
    {
        return $this->dateInscrit;
    }

    public function setDateInscrit(\DateTimeInterface $dateInscrit): self
    {
        $this->dateInscrit = $dateInscrit;

        return $this;
    }


}
