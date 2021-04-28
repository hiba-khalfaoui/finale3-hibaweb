<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis", indexes={@ORM\Index(name="apprenant_id", columns={"apprenant_id"}), @ORM\Index(name="formateur_id", columns={"formateur_id"})})
 * @ORM\Entity
 */
class Avis
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
     * @var int
     *
     * @ORM\Column(name="formateur_id", type="integer", nullable=false)
     */
    private $formateurId;

    /**
     * @var int
     *
     * @ORM\Column(name="apprenant_id", type="integer", nullable=false)
     */
    private $apprenantId;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormateurId(): ?int
    {
        return $this->formateurId;
    }

    public function setFormateurId(int $formateurId): self
    {
        $this->formateurId = $formateurId;

        return $this;
    }

    public function getApprenantId(): ?int
    {
        return $this->apprenantId;
    }

    public function setApprenantId(int $apprenantId): self
    {
        $this->apprenantId = $apprenantId;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }


}
