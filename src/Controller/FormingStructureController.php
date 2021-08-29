<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormingStructureController extends AbstractController
{
    /**
     * @Route("/forming/structure", name="forming_structure")
     */
    public function index(): Response
    {
        return $this->render('forming_structure/index.html.twig', [
            'controller_name' => 'FormingStructureController',
        ]);
    }
}
