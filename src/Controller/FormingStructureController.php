<?php

namespace App\Controller;

use App\Entity\FormingStructure;
use App\Form\FormingStructureType;
use App\Helper\Toolkit;
use App\Repository\FormingStructureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/management/forming-structures")
 */
class FormingStructureController extends AbstractController
{
    /**
     * @Route("/", name="formingStructure_index")
     * @param FormingStructureRepository $fsRepo
     * @return Response
     */
    public function index(FormingStructureRepository $fsRepo): Response
    {
        return $this->render('forming_structure/index.html.twig', [
            'fsList' => $fsRepo->findAll(),
            'nav' => 'fst'
        ]);
    }

    /**
     * @Route("/new", name="new_formingStructure", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $fStructure = new FormingStructure();
        $form = $this->createForm(FormingStructureType::class, $fStructure);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $fStructure->setFsCreatedAt(Toolkit::getDateTimeNow());
            $entityManager->persist($fStructure);
            $entityManager->flush();

            return $this->redirectToRoute('formingStructure_index');
        }

        return $this->render('forming_structure/new.html.twig', [
            'fStructure' => $fStructure,
            'nav' => 'fst',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="formingStructure_edit", methods={"GET","POST"})
     * @param Request $request
     * @param FormingStructure $forming
     * @return Response
     */
    public function edit(Request $request, FormingStructure $forming): Response
    {
        $form = $this->createForm(FormingStructureType::class, $forming);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($forming);
            $entityManager->flush();

            return $this->redirectToRoute('formingStructure_index');
        }

        return $this->render('forming_structure/edit.html.twig', [
            'fs' => $forming,
            'nav' => 'fst',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="formingStructure_delete", methods={"POST"})
     * @param int $id
     * @param FormingStructureRepository $fsRepo
     * @param Request $request
     * @return Response
     */
    public function delete(int $id, FormingStructureRepository $fsRepo, Request $request): Response
    {
        $fStructure = $fsRepo->find($id);
        if (is_null($fStructure)) {
            // 404 NOT FOUND
        }

        if ($this->isCsrfTokenValid('delete' . $fStructure->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fStructure);
            $entityManager->flush();
        }

        return $this->redirectToRoute('formingStructure_index');
    }
}
