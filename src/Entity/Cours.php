<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Cours
 *
 * @ORM\Table(name="cours", indexes={@ORM\Index(name="IDX_FDCA8C9CBCF5E72D", columns={"categorie_id"}), @ORM\Index(name="id_formation", columns={"formation_id"})})
 * @ORM\Entity
 */
class Cours
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
     * @ORM\Column(name="titre", type="string", length=1024, nullable=true)
     * @Assert\NotBlank(message="veuillez renseigner ce champ")
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier", type="string", length=1024, nullable=true)
     * @Assert\NotBlank(message="veuillez renseigner ce champ")
     */
    private $fichier;

    /**
     * @var int
     *
     * @ORM\Column(name="formation_id", type="integer", nullable=true)
     */
    private $formationId;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_cat", type="string", length=255, nullable=true)
     */
    private $descriptionCat;

    /**
     * @var int|null
     *
     * @ORM\Column(name="categorie_id", type="integer", nullable=true)
     */
    private $categorieId;

    /**
     * @ORM\Column(name="favoris" , type="boolean", nullable=true)
     */
    private $favoris;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(?string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getFormationId(): ?int
    {
        return $this->formationId;
    }

    public function setFormationId(?int $formationId): self
    {
        $this->formationId = $formationId;

        return $this;
    }

    public function getDescriptionCat(): ?string
    {
        return $this->descriptionCat;
    }

    public function setDescriptionCat(?string $descriptionCat): self
    {
        $this->descriptionCat = $descriptionCat;

        return $this;
    }

    public function getCategorieId(): ?int
    {
        return $this->categorieId;
    }

    public function setCategorieId(?int $categorieId): self
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    public function getFavoris(): ?bool
    {
        return $this->favoris;
    }

    public function setFavoris(?bool $favoris): self
    {
        $this->favoris = $favoris;

        return $this;
    }




}
