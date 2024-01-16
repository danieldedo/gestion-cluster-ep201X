<?php

namespace App\Controller;

use App\Repository\CommunesRepository;
use App\Repository\VillagesRepository;
use App\Repository\ArrondissementsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/ajax')]
class AjaxController extends AbstractController
{
   
    #[Route('/get_communes/{departementId}', name: 'get_communes', methods: ['POST', 'GET'])]

    public function getCommunes($departementId, CommunesRepository $communesRepository)
    {
        $communes = $communesRepository->findBy(['departement' => $departementId],['nom' => 'DESC']);
        // dd($communes);   
        $communesOptions = [];
        foreach ($communes as $commune) {
            $communesOptions[$commune->getId()] = $commune->getNom();
        }

        return new JsonResponse($communesOptions);
    }
    
    #[Route('/get_arrondissements/{communeId}', name: 'get_arrondissements', methods: ['POST'])]

    public function getArrondissements($communeId, ArrondissementsRepository $arrondissementRepository)
    {
        $arrondissements = $arrondissementRepository->findBy(['commune' => $communeId]);

        $arrondissementOptions = [];
        foreach ($arrondissements as $arrondissement) {
            $arrondissementOptions[$arrondissement->getId()] = $arrondissement->getNom();
        }

        return new JsonResponse($arrondissementOptions);
    }

    #[Route('/get_villages/{arrondissementId}', name: 'get_villages', methods: ['POST'])]
    public function getVillages($arrondissementId, VillagesRepository $villageRepository)
    {
        $villages = $villageRepository->findBy(['arrondissement' => $arrondissementId]);

        $villageOptions = [];
        foreach ($villages as $village) {
            $villageOptions[$village->getId()] = $village->getNom();
        }

        return new JsonResponse($villageOptions);
    }

    
}
