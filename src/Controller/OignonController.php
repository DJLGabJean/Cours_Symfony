<?php

namespace App\Controller;

use App\Repository\OignonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OignonController extends AbstractController
{
    #[Route('/oignon', name: 'liste_des_oignons')]
    public function liste(OignonRepository $oignonRepository): Response
    {
        $oignons = $oignonRepository->findAll();
     
        return $this->render('oignons.html.twig', [
            'oignons' => $oignons
        ]);
    }
}
