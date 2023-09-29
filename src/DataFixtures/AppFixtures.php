<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Vehicule;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{  
    /**
     * @var Generator
    */

    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 50; $i++) {
            $voiture = new Vehicule();
            $voiture->setName($this->faker->word())
                    ->setBrand($this->faker->word())
                    ->setMileage(mt_rand(10000, 200000))
                    ->setPlace(mt_rand(2, 5));

            $manager->persist($voiture);
        }

        $manager->flush();
    }
}
