<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Tutor
 *
 * @ORM\Table(name="tutor")
 * @ORM\Entity(repositoryClass="App\Repository\TutorRepository")
 */
class Tutor
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
     */
    private $password;

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
     * @ORM\Column(name="profile_picture", type="string", length=150, nullable=true)
     * @Assert\NotBlank(message="profile pic is required")
     */
    private $profilePicture;

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
     * @var int
     *
     * @ORM\Column(name="nb_formation", type="integer", nullable=false)
     * @Assert\NotBlank(message="nb formation is required")
     */
    private $nbFormation = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="certificats", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="certificats is required")
     */
    private $certificats;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_student", type="integer", nullable=false)
     * @Assert\NotBlank(message="nb student is required")
     */
    private $nbStudent = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="price_hour", type="float", precision=10, scale=0, nullable=false)
     * @Assert\NotBlank(message="price hour is required")
     */
    private $priceHour;

    /**
     * @var int
     *
     * @ORM\Column(name="schedule", type="integer", nullable=false)
     * @Assert\NotBlank(message="schedule is required")
     */
    private $schedule = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cv", type="string", length=150, nullable=true)
     * @Assert\NotBlank(message="cv is required")
     */
    private $cv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="video", type="string", length=150, nullable=true)
     * @Assert\NotBlank(message="video is required")
     */
    private $video;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="subject is required")
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="language is required")
     */
    private $language;

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
    public function getProfilePicture(): ?string
    {
        return $this->profilePicture;
    }

    /**
     * @param string|null $profilePic
     */
    public function setProfilePicture(?string $profilePicture): void
    {
        $this->profilePicture = $profilePicture;
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
     * @return int
     */
    public function getNbFormation(): ?int
    {
        return $this->nbFormation;
    }

    /**
     * @param int $nbFormation
     */
    public function setNbFormation($nbFormation): void
    {
        $this->nbFormation = $nbFormation;
    }

    /**
     * @return string
     */
    public function getCertificats(): ?string
    {
        return $this->certificats;
    }

    /**
     * @param string $certificats
     */
    public function setCertificats(string $certificats): void
    {
        $this->certificats = $certificats;
    }

    /**
     * @return int
     */
    public function getNbStudent(): ?int
    {
        return $this->nbStudent;
    }

    /**
     * @param int $nbStudent
     */
    public function setNbStudent($nbStudent): void
    {
        $this->nbStudent = $nbStudent;
    }

    /**
     * @return float
     */
    public function getPriceHour(): ?float
    {
        return $this->priceHour;
    }

    /**
     * @param float $priceHour
     */
    public function setPriceHour(float $priceHour): void
    {
        $this->priceHour = $priceHour;
    }

    /**
     * @return int
     */
    public function getSchedule(): ?int
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

    /**
     * @return string|null
     */
    public function getCv(): ?string
    {
        return $this->cv;
    }

    /**
     * @param string|null $cv
     */
    public function setCv(?string $cv): void
    {
        $this->cv = $cv;
    }

    /**
     * @return string|null
     */
    public function getVideo(): ?string
    {
        return $this->video;
    }

    /**
     * @param string|null $video
     */
    public function setVideo(?string $video): void
    {
        $this->video = $video;
    }

    /**
     * @return string
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }


}
