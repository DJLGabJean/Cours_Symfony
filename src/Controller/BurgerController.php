<?php

namespace App\Controller;

use App\Repository\BurgerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/burger', name: 'burger')]
class BurgerController extends AbstractController
{
    #[Route('/liste', name: 'liste_des_burgers')]
    public function liste(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findAll();
     
        return $this->render('liste_burger.html.twig', [
            'burgers' => $burgers,
        ]);
    }
}
?>


