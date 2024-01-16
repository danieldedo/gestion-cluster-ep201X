<?php

namespace App\Entity;

use App\Repository\ArrondissementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArrondissementsRepository::class)]
class Arrondissements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'arrondissements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Communes $commune = null;

    #[ORM\OneToMany(mappedBy: 'arrondissement', targetEntity: Villages::class, orphanRemoval: true)]
    private Collection $villages;

    public function __construct()
    {
        $this->villages = new ArrayCollection();
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

    public function getCommune(): ?Communes
    {
        return $this->commune;
    }

    public function setCommune(?Communes $commune): static
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * @return Collection<int, Villages>
     */
    public function getVillages(): Collection
    {
        return $this->villages;
    }

    public function addVillage(Villages $village): static
    {
        if (!$this->villages->contains($village)) {
            $this->villages->add($village);
            $village->setArrondissement($this);
        }

        return $this;
    }

    public function removeVillage(Villages $village): static
    {
        if ($this->villages->removeElement($village)) {
            // set the owning side to null (unless already changed)
            if ($village->getArrondissement() === $this) {
                $village->setArrondissement(null);
            }
        }

        return $this;
    }
}
