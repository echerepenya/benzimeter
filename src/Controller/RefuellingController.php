<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Constraints as Assert;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted("ROLE_USER")]
class RefuellingController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        
        return $this->render('refuelling/index.html.twig', [
            'title' => 'Записи',
            'message' => 'Записи',
        ]);
    }

}
