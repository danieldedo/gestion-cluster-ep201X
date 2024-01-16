<?php

namespace App\Controller;

use App\Entity\Clusters;
use App\Form\ClustersType;
use App\Repository\ClustersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/clusters')]
class ClustersController extends AbstractController
{
    #[Route('/', name: 'app_clusters_index', methods: ['GET'])]
    public function index(ClustersRepository $clustersRepository): Response
    {

        $clusters = $clustersRepository->findBy([],['nom'=> 'asc']);
        
        return $this->render('clusters/index.html.twig', [
            'clusters' => $clusters,
        ]);
    }

    #[Route('/new', name: 'app_clusters_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cluster = new Clusters();
        $form = $this->createForm(ClustersType::class, $cluster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($cluster);
            $entityManager->persist($cluster);
            $entityManager->flush();
            $this->addFlash('success', 'Le cluster a été créer avec succès.');

            return $this->redirectToRoute('app_clusters_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('clusters/new.html.twig', [
            'cluster' => $cluster,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_clusters_show', methods: ['GET'])]
    public function show(Clusters $cluster): Response
    {
        return $this->render('clusters/show.html.twig', [
            'cluster' => $cluster,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_clusters_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Clusters $cluster, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClustersType::class, $cluster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Le cluster a été modifié avec succès.');

            return $this->redirectToRoute('app_clusters_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('clusters/edit.html.twig', [
            'cluster' => $cluster,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_clusters_delete', methods: ['POST', 'GET'])]
    public function delete(Clusters $cluster, EntityManagerInterface $entityManager): Response
    {
            $entityManager->remove($cluster);
            $entityManager->flush();
            $this->addFlash('error','Le cluster a été supprimé avec succès.');

        return $this->redirectToRoute('app_clusters_index', [], Response::HTTP_SEE_OTHER);
    }

}
