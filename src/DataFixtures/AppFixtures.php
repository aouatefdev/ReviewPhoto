<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Photo;
use Doctrine\Persistence\ObjectManager;
// use App\DataFixtures\UserPasswordHacherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{   
    private $passwordHasher;     
    public function __construct(UserPasswordHasherInterface $passwordHasher) 
    {                 
        $this->passwordHasher = $passwordHasher;     
    } 

    public function loadPhotos(ObjectManager $manager): void
    {          
            for ($i = 1; $i <= 5; $i++){             
                $photo = new Photo();             
                $photo->setTitle('Photo numéro '.$i);             
                $photo->setPostAt( (new \DateTimeImmutable())->add(\DateInterval::createFromDateString('-'.$i.' week')));             
                $manager->persist($photo);         
            }         
            
            $manager->flush();   // demande à doctrine de créer l’ordre sql INSERT     }   
    }
    
    public function loadUsers(ObjectManager $manager)
    {      
        $user = new User();
        $user->setEmail('user1@dwwm.fr');
        $user->setPseudo('user_1');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'user1'));
        $manager->persist($user);
        $manager->flush();

    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $this->loadPhotos($manager);         
        $this->loadUsers($manager); 

        $manager->flush();
    }
}
