<?php

namespace App\Entity;

use App\Repository\LocalidadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: LocalidadRepository::class)]
#[Broadcast]
class Localidad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\ManyToOne(inversedBy: 'localidads')]
    private ?Provincia $Provincia = null;

    #[ORM\OneToMany(mappedBy: 'Localidad', targetEntity: Ruta::class)]
    private Collection $rutas;

    public function __construct()
    {
        $this->rutas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getProvincia(): ?Provincia
    {
        return $this->Provincia;
    }

    public function setProvincia(?Provincia $Provincia): static
    {
        $this->Provincia = $Provincia;

        return $this;
    }

    /**
     * @return Collection<int, Ruta>
     */
    public function getRutas(): Collection
    {
        return $this->rutas;
    }

    public function addRuta(Ruta $ruta): static
    {
        if (!$this->rutas->contains($ruta)) {
            $this->rutas->add($ruta);
            $ruta->setLocalidad($this);
        }

        return $this;
    }

    public function removeRuta(Ruta $ruta): static
    {
        if ($this->rutas->removeElement($ruta)) {
            // set the owning side to null (unless already changed)
            if ($ruta->getLocalidad() === $this) {
                $ruta->setLocalidad(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->nombre;
    }
}
