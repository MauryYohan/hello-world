<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Entity\Country;
use Doctrine\ORM\Mapping\Id;
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

        if (!$continent) {  throw $this->createNotFoundException('No continent found with this id : ' . $continentId); }

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


    /**
     * @Route("/country/{countryId<[0-9]+>}", name="app_country")
     */
    public function country(int $countryId): Response
    {
        $country = $this->getDoctrine()
            ->getRepository(Country::class)
            ->find($countryId);

        if (!$country) { $this->createNotFoundException('No country found with this id : ' . $countryId); }

        return $this->render('pages/countries/country.html.twig', ['country' => $country]);
    }

    
    /**
     * @Route("/country/list/{continentId<[1-6]>}", name="app_country_list")
     */
    public function countryList(int $continentId): Response
    {

        $repo_country = $this->getDoctrine()->getRepository(Country::class);
        $countries = $repo_country->findBy( array('continent' => $continentId) );

        $repo_continent = $this->getDoctrine()->getRepository(Continent::class);
        $continent = $repo_continent->findOneBy(['id' => $continentId]);
        // dd($countries);
        return $this->render('pages/countries/countries.html.twig', 
            [
                'continent' => $continent, 
                'countries' => $countries
            ]);        
        
    }
}
