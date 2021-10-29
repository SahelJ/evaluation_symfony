<?php

namespace App\Controller;

use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VilleController extends AbstractController
{
    #[Route('/', name: 'choixVille')]
    public function index(VilleRepository $villeRepository): Response
    {

        // dd($villeRepository->findAll());
        return $this->render('ville/index.html.twig', [
            'controller_name' => 'VilleController',
            'villes' => $villeRepository->findAll(),
        ]);
    }

    #[Route('/ville/{nom}', name: 'Ville')]
    public function ville(VilleRepository $villeRepository, $nom): Response
    {

        
        return $this->render('ville/ville.html.twig', [

            'controller_name' => 'VilleController',

            'ville' => $villeRepository->findOneBy(['nom' => $nom]),
        ]);
    }


}
