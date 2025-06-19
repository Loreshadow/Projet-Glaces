<?php

namespace App\Controller;

use App\Repository\GlacesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListeGlacesController extends AbstractController
{
    #[Route('/liste/glaces', name: 'liste_glaces')]
    public function index(GlacesRepository $repository): Response
    {
        $glaces = $repository->findAll();


        return $this->render('liste_glaces/list_glace.html.twig', [
            'glaces' => $glaces,
        ]);
    }
}
