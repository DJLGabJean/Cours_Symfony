<?php

namespace App\Controller;

use App\Repository\SauceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SauceController extends AbstractController
{
    #[Route('/sauce', name: 'liste_des_sauces')]
    public function liste(SauceRepository $sauceRepository): Response
    {
        $sauces = $sauceRepository->findAll();
     
        return $this->render('sauces.html.twig', [
            'sauces' => $sauces
        ]);
    }
}
