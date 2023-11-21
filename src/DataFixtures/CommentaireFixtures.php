<?php

namespace App\DataFixtures;
 
use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 
class CommentaireFixtures extends Fixture
{
    public const COMMENTAIRE_REFERENCE = 'Commentaire';
    public function load(ObjectManager $manager)
    {
        $descriptions = [
            'Burger Iconique de McDo',
            'Burger Iconique de Quick',
            'Burger Iconique de Burger King'
        ];
 
        foreach ($descriptions as $key => $description) {
            $commentaire = new Commentaire();
            $commentaire->setTexte($description);
            $manager->persist($commentaire);
            $this->addReference(self::COMMENTAIRE_REFERENCE . '_' . $key, $commentaire);
        }
 
        $manager->flush();
    }
}

?>