<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/burger', name: 'burger')]
class BurgerController extends AbstractController
{
    #[Route('/liste', name: 'liste_des_burgers')]
    public function listeDesBurgers(): Response
    {
        return $this->render('liste_burger.html.twig', [
            'message' => 'Liste des burgers',
        ]);
    }
}
?>
