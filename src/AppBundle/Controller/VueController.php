<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class VueController extends Controller
{
    /**
	* @Route("/",name="Accueil")
	*/
	public function Accueil()
	{
		return $this->render('pages/accueil.html.twig');
		// header('locaton:WWW.facebook.com');
	}

	/**
	* @Route("/Portfolio",name="Portfolio")
	*/
	public function Portfolio()
	{
		return $this->render('pages/portfolio.html.twig');
	}

	/**
	* @Route("/Mes Projets",name="Projets")
	*/
	public function MesProjets()
	{
		return $this->render('pages/projets.html.twig');
	}

	/**
	* @Route("/Tutos",name="Tutos")
	*/
	public function Tutos()
	{
		return $this->render('pages/tutos.html.twig');
	}

	/**
	* @Route("/A_propos_de_moi/Philosophie",name="philosophie")
	*/
	public function Philosophie()
	{
		return $this->render('pages/philosophie.html.twig');
	}

	/**
	* @Route("/A_propos_de_moi/Loisirs_et_divers",name="Loisirs_et_divers")
	*/
	public function Loisirs()
	{
		return $this->render('pages/loisirs.html.twig');
	}

	/**
	* @Route("/Me_Contacter",name="Me_contacter")
	*/
	public function Contacter()
	{
		return $this->render('pages/contacts.html.twig');
	}

	/**
	* @Route("/A_propos_de_moi/Informations_Personnelles", name="Informations_Personnelles")
	*/
	public function InformationsPersonnelles()
	{
		return $this->render('pages/Affichage.html.twig' );
    }
    
    /**
     * @Route("/messages")
     */
    public function listMessages()
    {
        $em = $this->getDoctrine()->getManager();
        $message = $em->getRepository('AppBundle:messages')
            ->findAll();

            return $this->render('genuspages/list.html.twig', [
                'genusesmessages' => $messages
            ]);
    }
}
