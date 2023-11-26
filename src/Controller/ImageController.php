<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{
    #[Route('/image', name: 'liste_des_images')]
    public function liste(ImageRepository $imageRepository): Response
    {
        $images = $imageRepository->findAll();
     
        return $this->render('images.html.twig', [
            'images' => $images
        ]);
    }
}
