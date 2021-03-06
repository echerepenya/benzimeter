<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use App\Form\CarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted("ROLE_USER")]
class CarController extends AbstractController
{
    private $carRepo;
    private $doctrine;

    public function __construct(CarRepository $carRepo, ManagerRegistry $doctrine)
    {
        $this->carRepo = $carRepo;
        $this->doctrine = $doctrine;
    }
    
    #[Route('/car', name: 'car')]
    public function show(Request $request): Response
    {
        $cars = $this->carRepo->findAll();

        return $this->render('car/index.html.twig', [
            'cars' => $cars,
            'add_button' => true
        ]);
    }

    #[Route('/car/add', name: 'add_car')]
    public function addCar(Request $request): Response
    {
        $car = new Car();
        $car->setCreatedAt(new \DateTimeImmutable('today'));
        
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $car = $form->getData();

            $entityManager = $this->doctrine->getManager();
            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute('car_success');
        }

        return $this->render('car/index.html.twig', [
            'message' => null,
            'form' => $form->createView(),
            'back' => true,
        ]);
    }

    #[Route('/car/edit/{id}', name: 'edit_car')]
    public function editCar(int $id, Request $request): Response
    {
        $car = $this->carRepo->find($id);

        if (!$car) {
            throw $this->createNotFoundException(
                'No car found for id '. $id
            );
        }

        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $car = $form->getData();

            $entityManager = $this->doctrine->getManager();
            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute('car_success');
        }        

        return $this->renderForm('car/index.html.twig', [
            'form' => $form,
            'back' => true,
        ]);
    }

    #[Route('/car-success', name: 'car_success')]
    public function car_success(): Response
    {
        $message = '???????????????????? ?????????????????? ??????????????';
        
        return $this->render('car/index.html.twig', [
            'title' => '??????????',
            'message' => $message          
        ]);
    }

}
