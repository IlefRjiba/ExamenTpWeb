<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\AjoutType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChangeEtudiantController extends AbstractController
{
    #[Route('/add', name: 'add_etudiant')]
    public function add( ManagerRegistry $doctrine , Request $request , Etudiant $etudiant = null): Response
    {
        if (!$etudiant){
            $etudiant = new Etudiant();
        }

        $form = $this->createForm(AjoutType::class, $etudiant);

        $form->handleRequest($request);
        if ($form->isSubmitted() ){

            $manager = $doctrine->getManager();
            $manager->persist($etudiant);
            $manager->flush();
            return $this->redirectToRoute('app_liste');
        }
        else{
            return $this->render('change_etudiant/add.html.twig', [
                'formulaire' => $form->createView()
            ]);
        }
    }

    #[Route('/delete/{id<\d+>?0}', name: 'delete_etudiant')]
    public function delete(ManagerRegistry $doctrine , Request $request, Etudiant $etudiant=null): Response
    {
        if ($etudiant) {
            $manager = $doctrine->getManager();
            $manager->remove($etudiant);
            $manager->flush();

        }
        return $this->redirectToRoute('app_liste');
    }

    #[Route('/edit/{id?0}', name: 'edit_etudiant')]
    public function edit(ManagerRegistry $doctrine , Request $request, Etudiant $etudiant=null): Response
    {
        if (!$etudiant){
            $etudiant = new Etudiant();
        }

        $form = $this->createForm(AjoutType::class, $etudiant);

        $form->handleRequest($request);
        if ($form->isSubmitted() ){

            $manager = $doctrine->getManager();
            $manager->persist($etudiant);
            $manager->flush();
            return $this->redirectToRoute('app_liste');
        }
        else{
            return $this->render('change_etudiant/add.html.twig', [
                'formulaire' => $form->createView()
            ]);
        }


    }
}
