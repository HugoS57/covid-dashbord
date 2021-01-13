<?php

namespace App\Entity;

use App\Repository\HospitalisationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HospitalisationRepository::class)
 */
class Hospitalisation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Hospitalisation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHospitalisation(): ?int
    {
        return $this->Hospitalisation;
    }

    public function setHospitalisation(int $Hospitalisation): self
    {
        $this->Hospitalisation = $Hospitalisation;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
