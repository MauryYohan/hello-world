<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('pages/index.html.twig', []);
    }

    /**
     * @Route("/continent/{continentId<[1-6]>}", name="app_continent")
     */
    public function continent(): Response
    {
        return $this->render('pages/continents/northamerica.html.twig', []);
    }
}
