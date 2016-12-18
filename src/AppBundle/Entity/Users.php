<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsersRepository")
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var date
     *
     * @ORM\Column(name="createdAt", type="date")
     */
    private $createdAt;

    /**
     * @var date
     *
     * @ORM\Column(name="updatedAt", type="date")
     */
    private $updatedAt;
	
	
    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string")
     */
    private $token;
	
    /**
     * @var date
     *
     * @ORM\Column(name="tokenDate", type="date")
     */
    private $tokenDate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Users
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param date $createdAt
     *
     * @return Users
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    /**
     * Get updatedAt
     *
     * @return date
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updateAt
     *
     * @param date $updatedAt
     *
     * @return Users
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
	
    /**
     * Get token
     *
     * @return date
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set token
     *
     * @param date $token
     *
     * @return Users
     */
    public function setToken($token)
    {
        $this->token = $token; 
		return $this;
    } 
	

    /**
     * Get tokenDate
     *
     * @return date
     */
    public function getTokenDate()
    {
        return $this->tokenDate;
    }

    /**
     * Set tokenDate
     *
     * @param date $tokentDate
     *
     * @return Users
     */
    public function setTokenDate($tokenDate)
    {
        $this->tokenDate = $tokenDate; 
		return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
    	$this->setUpdatedAt(new \DateTime('now'));

        if ($this->getCreatedAt() == null) {
           $this->setCreatedAt(new \DateTime('now'));
        }
    }
}

