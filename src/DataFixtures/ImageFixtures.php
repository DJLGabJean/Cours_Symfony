<?php

namespace App\DataFixtures;
 
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 
class ImageFixtures extends Fixture
{   
    private const IMAGE_REFERENCE = 'Image';
    public function load(ObjectManager $manager)
    {
        $nomsImages = [
            'Big Mac',
            'Giant',
            'Whopper',
        ];
 
        foreach ($nomsImages as $key => $nomImage) {
            $image = new Image();
            $image->setNom($nomImage);
            $manager->persist($image);
            $this->addReference(self::IMAGE_REFERENCE . '_' . $key, $image);
        }
 
        $manager->flush();
    }
}

?>