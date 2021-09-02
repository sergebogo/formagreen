<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavigationController extends AbstractController
{
    /**
     * Route("/", name="root")
     */
    public function index(): Response
    {
        return $this->render('navigation/index.html.twig', [
            'controller_name' => 'NavigationController',
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home(): Response
    {
        return $this->render('navigation/index.html.twig', [
            'controller_name' => 'NavigationController',
        ]);
    }

    /**
     * @Route("/se-connecter", name="login")
     */
    public function login(): Response
    {
        return $this->render('navigation/login.html.twig', [
            'controller_name' => 'NavigationController',
        ]);
    }

    /**
     * @Route("/se-deconnecter", name="logout")
     */
    public function logout(): Response
    {
        return $this->render('navigation/about.html.twig', [
            'controller_name' => 'NavigationController',
        ]);
    }
}
