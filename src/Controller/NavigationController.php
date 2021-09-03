<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavigationController extends AbstractController
{
    /**
     * Route("/", name="root", methods={"GET"})
     */
    public function index(): Response
    {
        // User is connected -> road to admin hom

        // redirect to login page
        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('navigation/about.html.twig', [
            'controller_name' => 'NavigationController',
        ]);
    }

    // **** USER CONNECTED ACTIONS **** //
    //*********************************//
    /**
     * @Route("/management", name="homeadmin")
     */
    public function homeAdmin(): Response
    {
        return $this->render('navigation/home.admin.html.twig', [
            'controller_name' => 'NavigationController',
        ]);
    }
}
