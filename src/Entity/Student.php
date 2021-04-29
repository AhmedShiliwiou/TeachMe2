<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="App\Repository\StudentRepository")
 * @UniqueEntity(fields = {"email"} , message = "Email is already used!")
 */
class Student implements UserInterface
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
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=30, nullable=true)
     * @Assert\NotBlank(message="Username is required")
     */

    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="Email is required")
     * @Assert\Email(message = "The email '{{ value }}' is not a valid
    email.")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="password is required")
     * @Assert\Length(min="8", minMessage="Password must have at least 8 charcters")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password",message="Password does not match")
     */
    public $confirmPassword;
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="first name is required")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="last name is required")
     */
    private $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="cin", type="integer", nullable=false)
     * @Assert\NotBlank(message="cin is required")
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=30, nullable=false, options={"default"="ReqAct"})
     * @Assert\NotBlank(message="status is required")
     */
    private $status = 'ReqAct';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_birth", type="date", nullable=false)
     * @Assert\NotBlank(message="date birth is required")
     */
    private $dateBirth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     * @Assert\NotBlank(message="date add is required")
     */
    private $dateAdd = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="profile_pic", type="string", length=150, nullable=true)
     * @Assert\NotBlank(message="profile pic is required")
     */
    private $profilePic;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=20, nullable=false)
     * @Assert\NotBlank(message="state is required")
     */
    private $state;

    /**
     * @var int
     *
     * @ORM\Column(name="phone_number", type="integer", nullable=false)
     * @Assert\NotBlank(message="phone number is required")
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="nb_formation_enrg", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="nb formation_enrg is required")
     */
    private $nbFormationEnrg = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="active_formation", type="string", length=30, nullable=false, options={"default"="None"})
     * @Assert\NotBlank(message="active formation is required")
     */
    private $activeFormation = 'None';

    /**
     * @var string
     *
     * @ORM\Column(name="finished_formation", type="string", length=30, nullable=false, options={"default"="None"})
     * @Assert\NotBlank(message="finished formation is required")
     */
    private $finishedFormation = 'None';

    /**
     * @var int
     *
     * @ORM\Column(name="schedule", type="integer", nullable=false)
     * @Assert\NotBlank(message="schedule is required")
     */
    private $schedule = '0';




    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return int
     */
    public function getCin(): ?int
    {
        return $this->cin;
    }

    /**
     * @param int $cin
     */
    public function setCin(int $cin): void
    {
        $this->cin = $cin;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return \DateTime
     */
    public function getDateBirth(): ?\DateTime
    {
        return $this->dateBirth;
    }

    /**
     * @param \DateTime $dateBirth
     */
    public function setDateBirth(\DateTime $dateBirth): void
    {
        $this->dateBirth = $dateBirth;
    }

    /**
     * @return \DateTime
     */
    public function getDateAdd(): ?\DateTime
    {
        return $this->dateAdd;
    }

    /**
     * @param \DateTime $dateAdd
     */
    public function setDateAdd($dateAdd): void
    {
        $this->dateAdd = $dateAdd;
    }

    /**
     * @return string|null
     */
    public function getProfilePic(): ?string
    {
        return $this->profilePic;
    }

    /**
     * @param string|null $profilePic
     */
    public function setProfilePic(?string $profilePic): void
    {
        $this->profilePic = $profilePic;
    }

    /**
     * @return string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    /**
     * @param int $phoneNumber
     */
    public function setPhoneNumber(int $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getNbFormationEnrg(): ?string
    {
        return $this->nbFormationEnrg;
    }

    /**
     * @param string $nbFormationEnrg
     */
    public function setNbFormationEnrg(string $nbFormationEnrg): void
    {
        $this->nbFormationEnrg = $nbFormationEnrg;
    }

    /**
     * @return string
     */
    public function getActiveFormation(): ?string
    {
        return $this->activeFormation;
    }

    /**
     * @param string $activeFormation
     */
    public function setActiveFormation(string $activeFormation): void
    {
        $this->activeFormation = $activeFormation;
    }

    /**
     * @return string
     */
    public function getFinishedFormation(): ?string
    {
        return $this->finishedFormation;
    }

    /**
     * @param string $finishedFormation
     */
    public function setFinishedFormation(string $finishedFormation): void
    {
        $this->finishedFormation = $finishedFormation;
    }

    /**
     * @return int
     */
    public function getSchedule() :?int
    {
        return $this->schedule;
    }

    /**
     * @param int $schedule
     */
    public function setSchedule($schedule): void
    {
        $this->schedule = $schedule;
    }


    public function getRoles(){
        return ['ROLE_STUDENT'];
    }

    public function getSalt(){}

    public function eraseCredentials(){}
}
