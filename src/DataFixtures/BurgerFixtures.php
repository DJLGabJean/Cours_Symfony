<?php

namespace App\DataFixtures;

use App\Entity\Burger;
use App\Entity\Commentaire;
use App\Entity\Image;
use App\Entity\Oignon;
use App\Entity\Pain;
use App\Entity\Sauce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BurgerFixtures extends Fixture
{
    public const BURGER_REFERENCE = 'Burger';

    public function load(ObjectManager $manager)
    {
        $nomsBurgers = [
            'Big Mac',
            'Giant',
            'Whopper'
        ];

        $oignons = $manager->getRepository(Oignon::class)->findAll();
        $sauces = $manager->getRepository(Sauce::class)->findAll();
        $images = $manager->getRepository(Image::class)->findAll();
        $commentaires = $manager->getRepository(Commentaire::class)->findAll();

        foreach ($nomsBurgers as $key => $nomBurger) {
            foreach ($oignons as $oignon) {
                foreach ($sauces as $sauce) {
                    foreach ($images as $image) {
                        foreach ($commentaires as $commentaire) {
                            $burger = new Burger();
                            $burger->setNom($nomBurger);
                            $burger->setOignon($oignon);
                            $burger->setSauce($sauce);
                            $burger->setImage($image);
                            $burger->setCommentaire($commentaire);
                            $manager->persist($burger);
                            $this->addReference(self::BURGER_REFERENCE . '_' . $key, $burger);
                        }
                    }
                }
            }
        }

        $manager->flush();
    }
}

