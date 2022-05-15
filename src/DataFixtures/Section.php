<?php

namespace App\DataFixtures;

use App\Entity\Section as EntitySection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Section extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $s = ["GL" , "RT" , "IIA" , "IMI"] ; 
        for ($i = 0; $i < 4 ; $i++) {
            $section = new EntitySection();
            $section-> setDesignation ($s[$i]) ;
            $manager->persist($section);
        }

        $manager->flush();
    }
}
