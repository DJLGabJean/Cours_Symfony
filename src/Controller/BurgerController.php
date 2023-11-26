<?php

namespace App\Controller;

use App\Repository\BurgerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BurgerController extends AbstractController
{
    #[Route('/burger', name: 'liste_des_burgers')]
    public function liste(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findAll();
     
        return $this->render('burgers.html.twig', [
            'burgers' => $burgers
        ]);
    }
}
?>




