<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/management/forming-structures")
 */
class FormingStructureController extends AbstractController
{
    /**
     * @Route("/", name="formingStructure-index")
     */
    public function index(): Response
    {
        return $this->render('forming_structure/index.html.twig', [
            'controller_name' => 'FormingStructureController',
            'nav' => 'fst'
        ]);
    }
}
