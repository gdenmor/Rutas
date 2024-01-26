<?php

namespace App\Entity;

use App\Repository\InformeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: InformeRepository::class)]
#[Broadcast]
class Informe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $observaciones = null;

    #[ORM\Column]
    private ?int $dinero = null;

    #[ORM\Column(length: 255)]
    private ?string $imagen = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Tour $Tour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): static
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getDinero(): ?int
    {
        return $this->dinero;
    }

    public function setDinero(int $dinero): static
    {
        $this->dinero = $dinero;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): static
    {
        $this->imagen = $imagen;

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
