<?php

namespace App\DataFixtures;

use App\Entity\Photo;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PhotoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
               
            for ($i = 1; $i <= 5; $i++){             
                $photo = new Photo();             
                $photo->setTitle('Photo numéro '.$i);             
                $photo->setPostAt( (new \DateTimeImmutable())->add(\DateInterval::createFromDateString('-'.$i.' week')));             
                $manager->persist($photo);         
            }         
            
            $manager->flush();   // demande à doctrine de créer l’ordre sql INSERT     } 
        
    }
}
