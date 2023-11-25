<?php

// src/DataFixtures/BurgerFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Burger;
use App\Entity\Pain;
use App\Entity\Oignon;
use App\Entity\Sauce;
use App\Entity\Image;
use App\Entity\Commentaire;

class BurgerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Récupérer toutes les références des entités associées
        $pains = $manager->getRepository(Pain::class)->findAll();
        $oignons = $manager->getRepository(Oignon::class)->findAll();
        $sauces = $manager->getRepository(Sauce::class)->findAll();
        $images = $manager->getRepository(Image::class)->findAll();
        $commentaires = $manager->getRepository(Commentaire::class)->findAll();

        // Assurez-vous que le nombre d'éléments est le même pour toutes les entités
        $count = count($pains);
        $this->checkConsistency($count, $oignons, $sauces, $images, $commentaires);

        // Création des burgers avec les références des entités associées
        foreach ($pains as $index => $pain) {
            $burger = new Burger();
            $burger
                ->setNom($images[$index]->getNom()) // Utilisez le nom de l'image pour le nom du burger
                ->setPain($pain);

            // Ajoutez des oignons, sauces, image, commentaire, etc.
            $burger->addOignon($oignons[$index]);
            $burger->addSauce($sauces[$index]);
            $burger->setImage($images[$index]);
            $burger->setCommentaire($commentaires[$index]);

            // Persistez le burger
            $manager->persist($burger);

            // Ajoutez une référence pour le burger
            $this->addReference('burger_' . $index, $burger);
        }

        // Flush pour enregistrer dans la base de données
        $manager->flush();
    }

    private function checkConsistency($count, $oignons, $sauces, $images, $commentaires)
    {
        if (count($oignons) !== $count
            || count($sauces) !== $count
            || count($images) !== $count
            || count($commentaires) !== $count
        ) {
            throw new \RuntimeException("Inconsistent data. The number of elements in associated entities is not the same.");
        }
    }

    public function getDependencies()
    {
        return [
            PainFixtures::class,
            OignonFixtures::class,
            SauceFixtures::class,
            ImageFixtures::class,
            CommentaireFixtures::class,
        ];
    }
}


