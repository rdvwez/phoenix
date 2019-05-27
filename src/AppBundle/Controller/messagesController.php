<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Emails;
use AppBundle\Entity\Messages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class messagesController extends Controller
{

    /**
     * @Route("/messages", name="liste_de_message")
     */
    public function listMessages()
    {
        $em = $this->getDoctrine()->getManager();
        $message = $em->getRepository('AppBundle:messages')
            ->findAll();

            return $this->render('pages/accueil.html.twig', [
                'messages' => $message
            ]);
    }


    /**
     * @Route("/enregistrer_messages", name="enregistrer_message")
    //  */
    // public function enregitrerMessages(Request $request)
    // {
    //     // $em = $this->getDoctrine()->getManager();
    //     // $message = $em->getRepository('AppBundle:Messages')
    //     //     ->findAll();

    //     //     return $this->render('pages/accueil.html.twig', [
    //     //         'messages' => $message
    //     //     ]);
    //     dump($request);
    //     return $this->render('pages/accueil.html.twig');

    //     // return $this->render('pages/accueil.html.twig');
    //     // var_dump($_POST);
    // }


}