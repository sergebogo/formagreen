<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/management/subscriptions")
 */
class SubscriptionController extends AbstractController
{
    /**
     * @Route("/", name="subscription_index")
     */
    public function index(): Response
    {
        return $this->render('subscription/index.html.twig', [
            'controller_name' => 'SubscriptionController',
            'nav' => 'sbs'
        ]);
    }
}
