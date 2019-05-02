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
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $contenu;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Emails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $email;
    

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(Emails $email)
    {
        $this->email = $email;
    }
   
}
