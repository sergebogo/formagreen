<?php

namespace App\Controller;

use App\Entity\Structure;
use App\Entity\Volunteer;
use App\Form\StructureType;
use App\Form\VolunteerType;
use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/management/members")
 */
class MemberController extends AbstractController
{
    /**
     * @Route("/", name="member_index")
     * @param MemberRepository $memberRepository
     * @return Response
     */
    public function index(MemberRepository $memberRepository): Response
    {
        return $this->render('member/index.html.twig', [
            'members' => $memberRepository->findAll(),
            'nav' => 'mbs'
        ]);
    }

    /**
     * @Route("/new/volunteer", name="new_volunteer", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function newVolunteer(Request $request): Response
    {
        $member = new Volunteer();
        $form = $this->createForm(VolunteerType::class, $member);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            //$member->setNom(true);

            $entityManager->persist($member);
            $entityManager->flush();

            return $this->redirectToRoute('member_index');
        }

        return $this->render('member/new.volunteer.html.twig', [
            'member' => $member,
            'nav' => 'mbs',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new/structure", name="new_structure", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function newStructure(Request $request): Response
    {
        $member = new Structure();
        $form = $this->createForm(StructureType::class, $member);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            //$member->setNom(true);

            $entityManager->persist($member);
            $entityManager->flush();

            return $this->redirectToRoute('member_index');
        }

        return $this->render('member/new.structure.html.twig', [
            'member' => $member,
            'nav' => 'mbs',
            'form' => $form->createView(),
        ]);
    }
}
