<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Examenquestion
 *
 * @ORM\Table(name="examenquestion", indexes={@ORM\Index(name="idQuestion", columns={"idQuestion"}), @ORM\Index(name="idExamen", columns={"idExamen"})})
 * @ORM\Entity
 */
class Examenquestion
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
     * @var \Examen
     *
     * @ORM\ManyToOne(targetEntity="Examen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idExamen", referencedColumnName="id")
     * })
     */
    private $idexamen;

    /**
     * @var \Question
     *
     * @ORM\ManyToOne(targetEntity="Question")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idQuestion", referencedColumnName="id")
     * })
     */
    private $idquestion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdexamen(): ?Examen
    {
        return $this->idexamen;
    }

    public function setIdexamen(?Examen $idexamen): self
    {
        $this->idexamen = $idexamen;

        return $this;
    }

    public function getIdquestion(): ?Question
    {
        return $this->idquestion;
    }

    public function setIdquestion(?Question $idquestion): self
    {
        $this->idquestion = $idquestion;

        return $this;
    }


}
