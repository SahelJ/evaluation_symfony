<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use App\Entity\Restaurant;
use App\Entity\Proprietaire;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');
           

        for ($i = 0; $i < 4; $i++) {
            $ville = new Ville();
            $ville->setNom($faker->city);
               
            for ($z = 0; $z < 30; $z++) {

                    $proprietaire = new proprietaire();
                    $proprietaire->setNom($faker->lastName);
                    $proprietaire->setPrenom($faker->firstNameMale);
                    $proprietaire->setDateNaissance($faker->dateTimeBetween($startDate = '-80 years', $endDate = '-25 years', $timezone = null));

                    $manager->persist($proprietaire);

                    $restaurant = new Restaurant();
                    $restaurant->setNom($faker->company);
                    $restaurant->setAdresse($faker->streetAddress);
                    $restaurant->setImage($faker->imageUrl(640, 480));
                    $restaurant->setProprietaire($proprietaire);
                    $restaurant->setVille($ville);
     
                    $manager->persist($restaurant);
                }

            $manager->persist($ville);
        }

        $manager->flush();

    }
}
