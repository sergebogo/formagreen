<?php

namespace App\Controller;

use App\Entity\GreenArea;
use App\Form\GreenAreaType;
use App\Repository\FormingStructureRepository;
use App\Repository\GreenAreaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/green-areas")
 */
class GreenAreaController extends AbstractController
{
    /**
     * @Route("/", name="greenarea_index")
     * @param GreenAreaRepository $gaRepo
     * @return Response
     */
    public function index(GreenAreaRepository $gaRepo): Response
    {
        return $this->render('green_area/index.html.twig', [
            'nav' => 'ga'
        ]);
    }

    /**
     * @Route("/list", name="greenarea_list")
     * @param GreenAreaRepository $gaRepo
     * @return Response
     */
    public function indexList(GreenAreaRepository $gaRepo): Response
    {
        return $this->render('green_area/list.html.twig', [
            'gareas' => $gaRepo->findAll(),
            'nav' => 'ga'
        ]);
    }

    /**
     * @Route("/new", name="new_greenarea", methods={"GET","POST"})
     * @param Request $request
     * @param FormingStructureRepository $fsRepo
     * @return Response
     */
    public function new(Request $request, FormingStructureRepository $fsRepo): Response
    {
        $garea = new GreenArea();
        $form = $this->createForm(GreenAreaType::class, $garea);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $garea->setFormingStructure($fsRepo->find(6));
            $entityManager->persist($garea);
            $entityManager->flush();
            return $this->redirectToRoute('greenarea_list');
        }

        return $this->render('green_area/new.html.twig', [
            'ga' => $garea,
            'nav' => 'ga',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="greenarea_show", methods={"GET"})
     * @param int $id
     * @param GreenAreaRepository $gaRepo
     * @return Response
     */
    public function show(int $id, GreenAreaRepository $gaRepo): Response
    {
        $ga = $gaRepo->find($id);
        if (is_null($ga)) {
            // 404 NOT FOUND∂
            return $this->render('green_area/show.html.twig', [
                'ga' => $ga,
                'nav' => 'ga'
            ]);
        }

        return $this->redirectToRoute('greenarea_list');
    }

    /**
     * @Route("/{id}/edit", name="greenarea_edit", methods={"GET","POST"})
     * @param Request $request
     * @param GreenArea $greenArea
     * @return Response
     */
    public function edit(Request $request, GreenArea $greenArea): Response
    {
        $form = $this->createForm(GreenAreaType::class, $greenArea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($greenArea);
            $entityManager->flush();

            return $this->redirectToRoute('greenarea_list');
        }

        return $this->render('green_area/edit.html.twig', [
            'ga' => $greenArea,
            'form' => $form->createView(),
            'nav' => 'ga'
        ]);
    }

    /**
     * @Route("/{id}", name="greenarea_delete", methods={"POST"})
     * @param int $id
     * @param GreenAreaRepository $gaRepo
     * @param Request $request
     * @return Response
     */
    public function delete(int $id, GreenAreaRepository $gaRepo, Request $request): Response
    {
        $ga = $gaRepo->find($id);
        if (is_null($ga)) {
            // 404 NOT FOUND
        }

        if ($this->isCsrfTokenValid('delete' . $ga->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ga);
            $entityManager->flush();
        }

        return $this->redirectToRoute('greenarea_list');
    }

    /**
     * Fonction de recuperation des coordonnes des green area
     * Sera appelée via Ajax
     *
     * @Route("/map/coordinates", name="greenarea_coordinates", methods={"POST"})
     * @param GreenAreaRepository $gaRepo
     * @param Request $request
     * @return Response
     */
    public function getGreenAreaCoordinates(GreenAreaRepository $gaRepo, Request $request): Response
    {
        if (!$request->isXmlHttpRequest()) {
            return new Response("Not Authorized", Response::HTTP_METHOD_NOT_ALLOWED);
        }

        $coords = [];
        $greenAreas = $gaRepo->findAll();
        foreach ($greenAreas as $index => $ga) {
            $coords[] = [
                'lat' => $ga->getGaLat(),
                'long' => $ga->getGaLong(),
                'nom' => $ga->getGaDetails()
            ];
        }

        return new Response(json_encode($coords));
    }
}
