<?php

namespace App\DataFixtures;

use App\Entity\Communes;
use App\Entity\Filieres;
use App\Entity\Villages;
use App\Entity\Departements;
use App\Entity\Arrondissements;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // filieres
        $filiere1 = new Filieres();
        $filiere1->setNom('IRT');
        $manager->persist($filiere1);

        $filiere2 = new Filieres();
        $filiere2->setNom('SRC');
        $manager->persist($filiere2);
        
        $filiere3 = new Filieres();
        $filiere3->setNom('SI');
        $manager->persist($filiere3);
        
        $filiere4 = new Filieres();
        $filiere4->setNom('AGR');
        $manager->persist($filiere4);
        
        //departements
        $departement1 = new Departements();
        $departement1->setNom('Alibori');
        $manager->persist($departement1);
        
        $departement2 = new Departements();
        $departement2->setNom('Littoral');
        $manager->persist($departement2);
        
        //Commmunes 1
        $commune1 = new Communes();
        $commune1->setNom('Banikoara');
        $commune1->setDepartement($departement1);
        $manager->persist($commune1);

        $commune2 = new Communes();
        $commune2->setNom('Segbana');
        $commune2->setDepartement($departement1);
        $manager->persist($commune2);

        $commune3 = new Communes();
        $commune3->setNom('Malanville');
        $commune3->setDepartement($departement1);
        $manager->persist($commune3);

        //Commmunes 2
        $commune4 = new Communes();
        $commune4->setNom('Cotonou');
        $commune4->setDepartement($departement2);
        $manager->persist($commune4);

        // Arrondissements=> Communes1
        $arrondissements1 = new Arrondissements();
        $arrondissements1->setNom('Founougo');
        $arrondissements1->setCommune($commune1);
        $manager->persist($arrondissements1);

        $arrondissements2 = new Arrondissements();
        $arrondissements2->setNom('Toura');
        $arrondissements2->setCommune($commune1);
        $manager->persist($arrondissements2);

        // Arrondissement=>Communes 2 
        $arrondissements3 = new Arrondissements();
        $arrondissements3->setNom('1er arrondissement de Cotonou');
        $arrondissements3->setCommune($commune2);
        $manager->persist($arrondissements3);

        $arrondissements4 = new Arrondissements();
        $arrondissements4->setNom('2e arrondissement de Cotonou');
        $arrondissements4->setCommune($commune2);
        $manager->persist($arrondissements4);
        

         // Villages=>Arr 1
         $village1 = new Villages();
         $village1->setNom('v1');
         $village1->setArrondissement($arrondissements1);
         $manager->persist($village1);
 
         $village2 = new Villages();
         $village2->setNom('v2');
         $village2->setArrondissement($arrondissements1);
         $manager->persist($village2);
 
         // Villages=>Arr 2 
         $arrondissements3 = new Villages();
         $arrondissements3->setNom('v3');
         $arrondissements3->setArrondissement($arrondissements2);
         $manager->persist($arrondissements3);
 
         $arrondissements4 = new Villages();
         $arrondissements4->setNom('v4');
         $arrondissements4->setArrondissement($arrondissements2);
         $manager->persist($arrondissements4);
        $manager->flush();
    }
}
