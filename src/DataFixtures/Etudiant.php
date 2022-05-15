<?php

namespace App\DataFixtures;

use App\Entity\Etudiant as EntityEtudiant;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Validator\Constraints\Length;

class Etudiant extends Fixture
{
    public function load(ObjectManager $manager): void
    { 
        $faker = Factory::create('fr_FR') ;

        $s = ["GL" , "RT" , "IIA" , "IMI" , "Etudiant non encore affecté à une section"] ; 
        for ($i = 0; $i < 20; $i++) {
            $etudiant = new EntityEtudiant();
            $etudiant->setNom($faker->lastName);
            $etudiant->setPrenom($faker -> firstName);
            $r = rand(0,4);
            $section = new Section()  ;
            $section-> setDesignation ($s[$r]) ;
            $etudiant-> setSection($section) ;
            $manager->persist($etudiant);
            $manager->persist($section);
        }


        $manager->flush();
    }
}
