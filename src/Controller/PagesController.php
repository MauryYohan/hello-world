<?php

namespace App\Controller;

use App\Entity\Continent;
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
    public function continent(int $continentId): Response
    {
        $continent = $this->getDoctrine()
            ->getRepository(Continent::class)
            ->find($continentId);

        if (!$continent) {
            throw $this->createNotFoundException('No product found with this id : ' . $continentId);
        }

        switch ($continent->getId()) {
            case 1:
                # Continent Afrique
                return $this->render('pages/continents/africa.html.twig', ['continentId' => $continent]);
                break;
            case 2:
                # Continent Afrique du Nord
                return $this->render('pages/continents/northamerica.html.twig', ['continentId' => $continent]);
                break;
            case 3:
                # Continent Afrique du Sud
                return $this->render('pages/continents/southamerica.html.twig', ['continentId' => $continent]);
                break;
            case 4:
                # Continent Asie
                return $this->render('pages/continents/asia.html.twig', ['continentId' => $continent]);
                break;
            case 5:
                # Continent Europe
                return $this->render('pages/continents/europa.html.twig', ['continentId' => $continent]);
                break;
            case 6:
                # Continent Oceanie
                return $this->render('pages/continents/oceania.html.twig', ['continentId' => $continent]);
                break;
        }
    }
}
