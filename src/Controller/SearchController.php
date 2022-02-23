<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Type;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
    
    public function searchBar() {
        $form = $this->createFormBuilder()
                ->setAction($this->generateUrl("search_handlesearch"))
                ->add('cherche', Type\TextType::class)
                ->add('envoiimo', Type\SubmitType::class)
                ->add('envoimmsi', Type\SubmitType::class)
                ->getForm()
        ;
        return $this->render('elements/searchbar.html.twig', [
            'formSearch' => $form->createView()
        ]);
    }
}
