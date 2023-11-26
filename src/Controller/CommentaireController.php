<?php

namespace App\Controller;

use App\Repository\CommentaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentaireController extends AbstractController
{
    #[Route('/commentaire', name: 'liste_des_commentaires')]
    public function liste(CommentaireRepository $commentaireRepository): Response
    {
        $commentaires = $commentaireRepository->findAll();
     
        return $this->render('commentaires.html.twig', [
            'commentaires' => $commentaires
        ]);
    }
}
?>


