<?php

namespace App\Controller;

use App\Entity\Opus;
use App\Form\OpusType;
use App\Repository\OpusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/opus")
 */
class OpusController extends AbstractController
{
    /**
     * @Route("/", name="opus_index", methods={"GET"})
     */
    public function index(OpusRepository $opusRepository): Response
    {
        return $this->render('opus/index.html.twig', [
            'opuses' => $opusRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="opus_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $opus = new Opus();
        $form = $this->createForm(OpusType::class, $opus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($opus);
            $entityManager->flush();

            return $this->redirectToRoute('opus_index');
        }

        return $this->render('opus/new.html.twig', [
            'opus' => $opus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="opus_show", methods={"GET"})
     */
    public function show(Opus $opus): Response
    {
        return $this->render('opus/show.html.twig', [
            'opus' => $opus,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="opus_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Opus $opus): Response
    {
        $form = $this->createForm(OpusType::class, $opus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('opus_index');
        }

        return $this->render('opus/edit.html.twig', [
            'opus' => $opus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="opus_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Opus $opus): Response
    {
        if ($this->isCsrfTokenValid('delete'.$opus->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($opus);
            $entityManager->flush();
        }

        return $this->redirectToRoute('opus_index');
    }
}
