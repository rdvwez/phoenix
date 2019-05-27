<?php

// src/AppBundle/Entity/Messages.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="messages")
 */
class Messages
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="contenu",type="text",nullable=false)
     * 
     */
    private $contenu;

    
    /**
     * 
     * @ORM\Column(name="email",type="string",nullable=false)
     */
    private $email;

    /**
     * 
     * @ORM\Column(name="createdAt",type="datetime",nullable=false)
     */
    private $createdAt;
    
    public function getId():?int
    {
        return $this->id;
    }

    public function getContenu():?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu):self
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
   
}
