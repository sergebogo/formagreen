<?php

namespace App\Controller;

use App\Entity\Subscription;
use App\Form\SubscriptionType;
use App\Helper\Toolkit;
use App\Repository\SubscriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/management/subscriptions")
 */
class SubscriptionController extends AbstractController
{
    /**
     * @Route("/", name="subscription_index")
     * @param SubscriptionRepository $subsRepo
     * @return Response
     */
    public function index(SubscriptionRepository $subsRepo): Response
    {
        return $this->render('subscription/index.html.twig', [
            'subs' => $subsRepo->findAll(),
            'nav' => 'sbs'
        ]);
    }

    /**
     * @Route("/new", name="new_subscription", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $subs = new Subscription();
        $form = $this->createForm(SubscriptionType::class, $subs);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $subs->setSbCreatedAt(Toolkit::getDateTimeNow());
            $subs->setSbIsValid(true);
            $entityManager->persist($subs);
            $entityManager->flush();

            return $this->redirectToRoute('subscription_index');
        }

        return $this->render('subscription/new.html.twig', [
            'subs' => $subs,
            'nav' => 'sbs',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="subscription_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Subscription $sub
     * @return Response
     */
    public function edit(Request $request, Subscription $sub): Response
    {
        $form = $this->createForm(SubscriptionType::class, $sub);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($sub);
            $entityManager->flush();

            return $this->redirectToRoute('subscription_index');
        }

        return $this->render('subscription/edit.html.twig', [
            'subs' => $sub,
            'nav' => 'sbs',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="subscription_delete", methods={"POST"})
     * @param int $id
     * @param SubscriptionRepository $subsRepo
     * @param Request $request
     * @return Response
     */
    public function delete(int $id, SubscriptionRepository $subsRepo, Request $request): Response
    {
        $subs = $subsRepo->find($id);
        if (is_null($subs)) {
            // 404 NOT FOUND
        }

        if ($this->isCsrfTokenValid('delete' . $subs->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($subs);
            $entityManager->flush();
        }

        return $this->redirectToRoute('subscription_index');
    }
}
