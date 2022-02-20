<?php

namespace App\Controller;

use App\Entity\Refuelling;
use App\Repository\RefuellingRepository;
use App\Form\RefuellingType;
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
    private $refuellingRepo;
    private $doctrine;

    public function __construct(RefuellingRepository $refuellingRepo, ManagerRegistry $doctrine)
    {
        $this->refuellingRepo = $refuellingRepo;
        $this->doctrine = $doctrine;
        $this->records = [];
    }
    
    #[Route('/', name: 'homepage')]
    public function showRecords(): Response
    {
        $records = $this->refuellingRepo->findAll();

        return $this->render('refuelling/index.html.twig', [
            'title' => 'Записи',
            'records' => $records,
            'add_record' => true,
        ]);
    }

    #[Route('/refuelling/add', name: 'add_refuelling')]
    public function add_refuelling(Request $request): Response
    {
        
        $record = new Refuelling();
        $record->setUser($this->getUser());
        $record->setCreatedAt(new \DateTimeImmutable('now'));
        
        $form = $this->createForm(RefuellingType::class, $record);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $record = $form->getData();

            $entityManager = $this->doctrine->getManager();
            $entityManager->persist($record);
            $entityManager->flush();

            return $this->redirectToRoute('refuelling_success');
        }

        return $this->renderForm('refuelling/index.html.twig', [
            'form' => $form,
            'records' => [],
            'add_record' => false,
            'back' => true,
        ]);
    }

    #[Route('/refuelling/success', name: 'refuelling_success')]
    public function refuelling_success(): Response
    {
        $message = 'Запись о заправке успешно сохранена';
        
        return $this->render('refuelling/success.html.twig', [
            'title' => 'Сохранено',
        ]);
    }
}
