<?php

namespace App\Controller;

use App\Repository\GreenAreaRepository;
use App\Repository\PartnershipRepository;
use App\Repository\VolunteerRepository;
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
     * @param VolunteerRepository $volRepo
     * @param PartnershipRepository $partRpo
     * @param GreenAreaRepository $greenRepo
     * @return Response
     */
    public function homeAdmin(VolunteerRepository $volRepo,
        PartnershipRepository $partRpo,
        GreenAreaRepository $greenRepo/*,
        StructureRepository $structRepo*/
    ): Response
    {
        // recuperation des infos stats de base
        //$volunteers = $volRepo->getVolunteerCount();
        $volunteers = 0;
        $partnerships = count($partRpo->findAll());
        $greenAreas = count($greenRepo->findAll());
        $donors = 0;

        return $this->render('navigation/home.admin.html.twig', [
            'controller_name' => 'NavigationController',
            'nav' => 'dsb',
            'stats' => [
                'volunteers' => $volunteers,
                'partnerships' => $partnerships,
                'greenAreas' => $greenAreas,
                'donors' => $donors
            ]
        ]);
    }
}
