<?php

namespace App\Controller;

use App\Repository\PainRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PainController extends AbstractController
{
    #[Route('/pain', name: 'liste_des_pains')]
    public function liste(PainRepository $painRepository): Response
    {
        $pains = $painRepository->findAll();
     
        return $this->render('pains.html.twig', [
            'pains' => $pains
        ]);
    }
}
