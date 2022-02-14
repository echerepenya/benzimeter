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
        $this->denyAccessUnlessGranted('ROLE_USER');

        $cars = $this->carRepo->findAll();

        return $this->render('car/index.html.twig', [
            'title' => 'Автомобили',
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
            'form' => $form->createView()
        ]);
    }

    #[Route('/car-success', name: 'car_success')]
    public function car_success(): Response
    {
        $message = 'Информация добавлена успешно';
        
        return $this->render('car/index.html.twig', [
            'title' => 'Успех',
            'message' => $message          
        ]);
    }

}
