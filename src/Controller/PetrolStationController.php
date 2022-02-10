<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\PetrolStation;
use App\Repository\PetrolStationRepository;
use App\Form\PetrolStationType;

class PetrolStationController extends AbstractController
{
    #[Route('/petrol/station', name: 'petrol_station')]
    public function index(PetrolStationRepository $petrolStationRepo): Response
    {
        $p_stations = $petrolStationRepo->findAll();

        return $this->render('petrol_station/index.html.twig', [
            'controller_name' => 'PetrolStationController',
            'stations' => $p_stations
        ]);
    }

    #[Route('/add-petrol-station', name: 'add_petrol_station')]
    public function addStation(Request $request, ManagerRegistry $doctrine): Response
    {
        $station = new PetrolStation();
        $form = $this->createForm(PetrolStationType::class, $station);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $station = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($station);
            $entityManager->flush();

            return $this->redirectToRoute('station_added');

        }

        return $this->renderForm('petrol_station/index.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/station-added', name: 'station_added')]
    public function task_success(): Response
    {
        return $this->render('petrol_station/index.html.twig', [
            'title' => 'Успех',
            'message' => 'Заправочная станция добавлена успешно'            
        ]);
    }
}
