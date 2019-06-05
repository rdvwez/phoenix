<?php

namespace AppBundle\Controller;
// namespace Symfony\Component\Validator\Constraints;
// use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Messages;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityManagerInterface;
// use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
// use Symfony\Component\Validator\Constraints\DateTime;

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
	*@Route("/enregistrer_messages", name="enregistrer_message")
	*/
	public function Contacter( Request $request,\Swift_Mailer $mailer)
	{
		$entityManager = $this->getDoctrine()->getManager();
		$messages = new Messages();
		// $messages->setCreatedAt(new \DateTime());
		$form = $this->createFormBuilder($messages)
			->add('email',EmailType::class)
			->add('contenu',TextareaType::class)
			// ->add('createdAt',DateTimeType::class)
			->getForm();
		$dt = new \DateTime();
		$code = null;
					
		$form->handleRequest($request);
		
		  
		

		if ($form->isSubmitted() && $form->isValid()) 
		{	
			$code = 1;
			// dump($messages->getContenu());
			
			
				$messages->setCreatedAt($dt);
				// dump($messages);
        // $messages = $form->getData();
				// $entityManager->persist($messages);
				// $entityManager->flush();
				
				$messageToSend = (new \Swift_Message('Accusé de réception de votre message'))
					->setFrom('vwezrd@gmail.com')
					->setTo($messages->getEmail())
					->setBody('
					Bonjour, votre message a été bien enregistré, je vous répondrai dans les plus bref delai.
					Coordialement.
					');
					$mailer->send($messageToSend);
					$messages = new Messages();

				// $request = Request::createFromGlobals();
				// $request->query->get('nom','success');
				// return $this->redirectToRoute('Me_contacter', ['code' => 	$code]);
				
    }
			
		return $this->render('pages/contacts.html.twig', [
						'formMessages' => $form->createView(),
						'code' => 	$code
    ]);

	}

	/**
	* @Route("/A_propos_de_moi/Informations_Personnelles", name="Informations_Personnelles")
	*/
	public function InformationsPersonnelles()
	{
		return $this->render('pages/Affichage.html.twig' );
  }
    
    
}
