<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ReservaRepository::class)]
#[Broadcast]
class Reserva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha_reserva = null;

    #[ORM\Column(length: 255)]
    private ?string $estado = null;

    #[ORM\ManyToOne(inversedBy: 'reservas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Usuario = null;

    #[ORM\ManyToOne(inversedBy: 'Reserva')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tour $tour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaReserva(): ?\DateTimeInterface
    {
        return $this->fecha_reserva;
    }

    public function setFechaReserva(\DateTimeInterface $fecha_reserva): static
    {
        $this->fecha_reserva = $fecha_reserva;

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

    public function getUsuario(): ?User
    {
        return $this->Usuario;
    }

    public function setUsuario(?User $Usuario): static
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    public function getTour(): ?Tour
    {
        return $this->tour;
    }

    public function setTour(?Tour $tour): static
    {
        $this->tour = $tour;

        return $this;
    }
}
