<?php

namespace App\Controller;

use App\Entity\PetrolStation;
use App\Repository\PetrolStationRepository;
use App\Form\PetrolStationType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use App\Service\ImageOptimizer;

class PetrolStationController extends AbstractController
{
    private $petrolStationRepo;
    private $doctrine;
    private $fileUploader;

    public function __construct(PetrolStationRepository $petrolStationRepo, ManagerRegistry $doctrine, FileUploader $fileUploader)
    {
        $this->petrolStationRepo = $petrolStationRepo;
        $this->doctrine = $doctrine;
        $this->fileUploader = $fileUploader;
    }
    
    #[Route('/petrol/station', name: 'petrol_station')]
    public function index(Request $request): Response
    {
        $stationList = $this->petrolStationRepo->findAll();

        $station = new PetrolStation();
        $form = $this->createForm(PetrolStationType::class, $station);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $station = $form->getData();

            $pictureFile = $form->get('picture')->getData();

            if($pictureFile) {
                $newFileName = $this->fileUploader->upload($pictureFile);                
                $station->setPictureFilename($newFileName);
            }
            
            $entityManager = $this->doctrine->getManager();
            $entityManager->persist($station);
            $entityManager->flush();

            return $this->redirectToRoute('station_added');
        }

        return $this->render('petrol_station/station_cards.html.twig', [
            'message' => null,
            'stations' => $stationList,
            'form' => $form->createView()
        ]);
    }

    #[Route('/petrol/station/{id}', name: 'change_station')]
    public function changeStation(Request $request, ?int $id = null): Response
    {
        $station = $this->petrolStationRepo->find($id);

        if (!$station) {
            throw $this->createNotFoundException(
                'No product found for id '. $id
            );
        }

        $form = $this->createForm(PetrolStationType::class, $station);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $station = $form->getData();

            $pictureFile = $form->get('picture')->getData();

            $station->setPictureFilename(
                $station->getPictureFilename()
            );

            if($pictureFile) {
                $newFileName = $this->fileUploader->upload($pictureFile);                
                $station->setPictureFilename($newFileName);
            }

            $entityManager = $this->doctrine->getManager();
            $entityManager->persist($station);
            $entityManager->flush();

            return $this->redirectToRoute('station_added');

        }

        return $this->render('petrol_station/index.html.twig', [
            'controller_name' => 'PetrolStationController',
            'form' => $form->createView()
        ]);
    }

    #[Route('/station-added', name: 'station_added')]
    public function task_success(): Response
    {
        $message = 'Информация добавлена успешно';
        
        return $this->render('petrol_station/index.html.twig', [
            'title' => 'Успех',
            'message' => $message          
        ]);
    }
}
