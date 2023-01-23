<?php

namespace App\Controller;

use App\Entity\Photo;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PhotoController extends AbstractController
{
    #[Route('/', name: 'photo.list')]
   
    public function list(): Response
    {
        // return $this->render('photo/list.html.twig', [
        //     'controller_name' => 'PhotoController',
        // ]);

        $photo = new Photo(); 
        $photo->setTitle('Ma première photo'); 
        $photo->setPostAt( new DateTimeImmutable()); 
        $photos = [] ; 
        $photos[] = $photo ; 

        return $this->render('photo/list.html.twig', ['photos' => $photos]) ; 

    }

}
