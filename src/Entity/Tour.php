<?php

namespace App\Entity;

use App\Repository\TourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: TourRepository::class)]
#[Broadcast]
class Tour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titulo = null;

    #[ORM\ManyToOne(inversedBy: 'tours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ruta $Ruta = null;

    #[ORM\OneToMany(mappedBy: 'tour', targetEntity: Reserva::class, orphanRemoval: true)]
    private Collection $Reserva;

    #[ORM\ManyToOne(inversedBy: 'tours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Guia=null;

    #[ORM\Column]
    private ?int $numplazas = null;

    #[ORM\OneToMany(mappedBy: 'Tour', targetEntity: Valoracion::class)]
    private Collection $valoracions;

    #[ORM\Column]
    private array $Horario = [];

    #[ORM\Column(length: 255)]
    private ?string $estado = null;

    public function __construct()
    {
        $this->Reserva = new ArrayCollection();
        $this->valoracions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getRuta(): ?Ruta
    {
        return $this->Ruta;
    }

    public function setRuta(?Ruta $Ruta): static
    {
        $this->Ruta = $Ruta;

        return $this;
    }

    /**
     * @return Collection<int, Reserva>
     */
    public function getReserva(): Collection
    {
        return $this->Reserva;
    }

    public function addReserva(Reserva $reserva): static
    {
        if (!$this->Reserva->contains($reserva)) {
            $this->Reserva->add($reserva);
            $reserva->setTour($this);
        }

        return $this;
    }

    public function removeReserva(Reserva $reserva): static
    {
        if ($this->Reserva->removeElement($reserva)) {
            // set the owning side to null (unless already changed)
            if ($reserva->getTour() === $this) {
                $reserva->setTour(null);
            }
        }

        return $this;
    }

    public function getGuia(): ?User
    {
        return $this->Guia;
    }

    public function setGuia(?User $Guia): static
    {
        $this->Guia = $Guia;

        return $this;
    }

    public function getNumplazas(): ?int
    {
        return $this->numplazas;
    }

    public function setNumplazas(int $numplazas): static
    {
        $this->numplazas = $numplazas;

        return $this;
    }

    /**
     * @return Collection<int, Valoracion>
     */
    public function getValoracions(): Collection
    {
        return $this->valoracions;
    }

    public function addValoracion(Valoracion $valoracion): static
    {
        if (!$this->valoracions->contains($valoracion)) {
            $this->valoracions->add($valoracion);
            $valoracion->setTour($this);
        }

        return $this;
    }

    public function removeValoracion(Valoracion $valoracion): static
    {
        if ($this->valoracions->removeElement($valoracion)) {
            // set the owning side to null (unless already changed)
            if ($valoracion->getTour() === $this) {
                $valoracion->setTour(null);
            }
        }

        return $this;
    }

    public function getHorario(): array
    {
        return $this->Horario;
    }

    public function setHorario(array $Horario): static
    {
        $this->Horario = $Horario;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }
}
