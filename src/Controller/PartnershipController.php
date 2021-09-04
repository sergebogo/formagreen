<?php

namespace App\Controller;

use App\Entity\Partnership;
use App\Form\PartnershipType;
use App\Repository\PartnershipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/management/partnerships")
 */
class PartnershipController extends AbstractController
{
    /**
     * @Route("/", name="partnership_index")
     * @param PartnershipRepository $partnerRepo
     * @return Response
     */
    public function index(PartnershipRepository $partnerRepo): Response
    {
        return $this->render('partnership/index.html.twig', [
            'partnerships' => $partnerRepo->findAll(),
            'nav' => 'prt'
        ]);
    }

    /**
     * @Route("/new", name="new_partnership", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $partner = new Partnership();
        $form = $this->createForm(PartnershipType::class, $partner);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($partner);
            $entityManager->flush();
            return $this->redirectToRoute('partnership_index');
        }

        return $this->render('partnership/new.html.twig', [
            'partnership' => $partner,
            'nav' => 'prt',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="partnership_show", methods={"GET"})
     * @param int $id
     * @param PartnershipRepository $partnerRepo
     * @return Response
     */
    public function show(int $id, PartnershipRepository $partnerRepo): Response
    {
        $partner = $partnerRepo->find($id);
        if (is_null($partner)) {
            // 404 NOT FOUND
            return $this->render('member/show.html.twig', [
                'partnership' => $partner,
                'nav' => 'prt'
            ]);
        }

        return $this->redirectToRoute('member_index');
    }

    /**
     * @Route("/{id}/edit", name="partnership_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Partnership $partnership
     * @return Response
     */
    public function edit(Request $request, Partnership $partnership): Response
    {
        $form = $this->createForm(PartnershipType::class, $partnership);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($partnership);
            $entityManager->flush();

            return $this->redirectToRoute('partnership_index');
        }

        return $this->render('partnership/edit.html.twig', [
            'partner' => $partnership,
            'form' => $form->createView(),
            'nav' => 'prt'
        ]);
    }

    /**
     * @Route("/{id}", name="partnership_delete", methods={"POST"})
     * @param int $id
     * @param PartnershipRepository $partnerRepo
     * @param Request $request
     * @return Response
     */
    public function delete(int $id, PartnershipRepository $partnerRepo, Request $request): Response
    {
        $partnership = $partnerRepo->find($id);
        if (is_null($partnership)) {
            // 404 NOT FOUND
        }

        if ($this->isCsrfTokenValid('delete' . $partnership->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($partnership);
            $entityManager->flush();
        }

        return $this->redirectToRoute('partnership_index');
    }
}
