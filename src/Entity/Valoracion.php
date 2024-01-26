<?php

namespace App\Entity;

use App\Repository\ValoracionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ValoracionRepository::class)]
#[Broadcast]
class Valoracion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $estrellas = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comentario = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Reserva $Reserva = null;

    #[ORM\ManyToOne(inversedBy: 'valoracions')]
    private ?Tour $Tour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstrellas(): ?int
    {
        return $this->estrellas;
    }

    public function setEstrellas(int $estrellas): static
    {
        $this->estrellas = $estrellas;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): static
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getReserva(): ?Reserva
    {
        return $this->Reserva;
    }

    public function setReserva(?Reserva $Reserva): static
    {
        $this->Reserva = $Reserva;

        return $this;
    }

    public function getTour(): ?Tour
    {
        return $this->Tour;
    }

    public function setTour(?Tour $Tour): static
    {
        $this->Tour = $Tour;

        return $this;
    }
}
