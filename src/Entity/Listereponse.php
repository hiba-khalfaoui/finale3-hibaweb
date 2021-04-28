<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listereponse
 *
 * @ORM\Table(name="listereponse", indexes={@ORM\Index(name="idReponse", columns={"idReponse"}), @ORM\Index(name="idQuestion", columns={"idQuestion"})})
 * @ORM\Entity
 */
class Listereponse
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
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    /**
     * @var \Reponse
     *
     * @ORM\ManyToOne(targetEntity="Reponse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idReponse", referencedColumnName="id")
     * })
     */
    private $idreponse;

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

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(int $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }

    public function getIdreponse(): ?Reponse
    {
        return $this->idreponse;
    }

    public function setIdreponse(?Reponse $idreponse): self
    {
        $this->idreponse = $idreponse;

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
