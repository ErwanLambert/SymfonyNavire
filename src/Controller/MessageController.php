<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Message;
//use Symfony\Component\Validator\Constraints\Type;
use App\Service\GestionContact;
use App\Form\MessageType;

/**
 * @Route("/message", name="message_")
 */
class MessageController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function index(): Response
    {
        return $this->render('message/index.html.twig', [
            'controller_name' => 'MessageController',
        ]);
    }
    
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, GestionContact $gestionContact): Response {
        $message = new Message();
        
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest();
                
        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData();
            
            $gestionContact->envoiMailContact($message);
            
            return $this->redirectToRoute("home");
        }
        
        return $this->render('message/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
