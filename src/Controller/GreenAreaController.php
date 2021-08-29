<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GreenAreaController extends AbstractController
{
    /**
     * @Route("/green/area", name="green_area")
     */
    public function index(): Response
    {
        return $this->render('green_area/index.html.twig', [
            'controller_name' => 'GreenAreaController',
        ]);
    }
}
