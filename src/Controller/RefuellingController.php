<?php

namespace App\Controller;

use App\Entity\Refuelling;
use App\Repository\RefuellingRepository;
use App\Form\RefuellingType;
use App\Entity\User;
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
    }
    
    #[Route('/', name: 'homepage')]
    public function showRecords(Request $request): Response
    {
        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $this->refuellingRepo->getRefuellingPaginator($offset);

        return $this->render('refuelling/index.html.twig', [
            'title' => 'Записи',
            'records' => $paginator,
            'previous' => $offset - RefuellingRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + RefuellingRepository::PAGINATOR_PER_PAGE),
            'add_record' => true,
            'form' => null,
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

    #[Route('refuelling/edit/{id}', name: 'edit_refuelling')]
    public function editRefuelling(Request $request, ?int $id = null)
    {
        $record = $this->refuellingRepo->find($id);

        if(!$record)
        {
            throw $this->createNotFoundException(
                'No record found for id '. $id
            );
        }

        if($record->getUser() !== $this->getUser())
        {
            throw $this->createAccessDeniedException();
        }

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

    #[Route('/me', name: 'my_name')]
    public function getMyName()
    {
        $user = $this->getUser();
        if($user instanceof User)
        {
            return $this->json([
                $user->getName(),
            ]);
        }

        return $this->json(
            null, 401
        );
    }
}
