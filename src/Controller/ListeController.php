<?php

namespace App\Controller;

use App\Entity\Etudiant;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeController extends AbstractController
{
    #[Route('/liste', name: 'app_liste')]
    public function index( PersistenceManagerRegistry $doctrine ): Response
    {
        $repository = $doctrine -> getRepository(Etudiant ::class);
        $etudiants = $repository -> findAll();

        return $this->render('liste/index.html.twig', [
            'controller_name' => 'ListeController',
            'etudiants' => $etudiants
        ]);
    }
}
