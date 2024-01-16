<?php

namespace App\Entity;

use App\Repository\FilieresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilieresRepository::class)]
class Filieres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'filiere', targetEntity: Clusters::class, orphanRemoval: true)]
    private Collection $clusters;

    public function __construct()
    {
        $this->clusters = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Clusters>
     */
    public function getClusters(): Collection
    {
        return $this->clusters;
    }

    public function addCluster(Clusters $cluster): static
    {
        if (!$this->clusters->contains($cluster)) {
            $this->clusters->add($cluster);
            $cluster->setFiliere($this);
        }

        return $this;
    }

    public function removeCluster(Clusters $cluster): static
    {
        if ($this->clusters->removeElement($cluster)) {
            // set the owning side to null (unless already changed)
            if ($cluster->getFiliere() === $this) {
                $cluster->setFiliere(null);
            }
        }

        return $this;
    }
}
