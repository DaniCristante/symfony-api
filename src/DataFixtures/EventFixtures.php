<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Event;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EventFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('es_ES');

        for ($i = 0; $i < 20; $i++){
            $this->createEvents($manager, $faker);
        }
        $manager->flush();
    }

    private function createEvents(ObjectManager $manager, $faker): void
    {
        $event = new Event();
        $event->setTitle($faker->text(30));
        $manager->persist($event);
    }
}
