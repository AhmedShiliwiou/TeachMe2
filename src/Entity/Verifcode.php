<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Verifcode
 *
 * @ORM\Table(name="verifcode", indexes={@ORM\Index(name="fk_idtutor", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="App\Repository\VerifCodeRepository")
 */
class Verifcode
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
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=20, nullable=false)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateAdd", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateadd = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateActiv", type="datetime", nullable=true)
     */
    private $dateactiv;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=20, nullable=false)
     */
    private $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDateadd(): ?\DateTimeInterface
    {
        return $this->dateadd;
    }

    public function setDateadd(\DateTimeInterface $dateadd): self
    {
        $this->dateadd = $dateadd;

        return $this;
    }

    public function getDateactiv(): ?\DateTimeInterface
    {
        return $this->dateactiv;
    }

    public function setDateactiv(?\DateTimeInterface $dateactiv): self
    {
        $this->dateactiv = $dateactiv;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }


}
