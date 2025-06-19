<?php

namespace App\Controller;

use App\Entity\Glaces;
use App\Form\GlaceTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class AddGlaceController extends AbstractController
{
    #[Route('/add/glace', name: 'add_glace')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $glaces = new Glaces();
    $form = $this->createForm(GlaceTypeForm::class, $glaces);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $entityManager->persist($glaces);
        $entityManager->flush();

        $this->addFlash('succes', 'Glace ajouté avec succès!');

        return $this->redirectToRoute('homepage');
    }


        return $this->render('add_glace/add_glace.html.twig', [
            'GlaceTypeForm' => $form->createView(),
        ]);
    }
}
