<?php

namespace App\Entity;

use App\Repository\ClustersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClustersRepository::class)]
class Clusters
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'clusters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Filieres $filiere = null;

    #[ORM\ManyToOne(inversedBy: 'clusters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Villages $village = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getFiliere(): ?Filieres
    {
        return $this->filiere;
    }

    public function setFiliere(?Filieres $filiere): static
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getVillage(): ?Villages
    {
        return $this->village;
    }

    public function setVillage(?Villages $village): static
    {
        $this->village = $village;

        return $this;
    }
}
