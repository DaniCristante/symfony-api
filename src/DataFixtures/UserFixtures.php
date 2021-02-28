<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private const MAX_DUMMY_USERS = 20;
    private const DEFAULT_PASSWORD = 'user1234';

    protected $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load (ObjectManager $manager): void
    {
        $faker = Factory::create('es_ES');
        $this->createAdminUser($manager);

        for ($i = 1; $i < self::MAX_DUMMY_USERS; $i++){
            $this->createUser($manager, $faker);
        }

        $manager->flush();
    }

    private function createUser(ObjectManager $manager, $faker): void
    {
        $randomName = $faker->unique()->name;
        $nameParts = \explode(' ', $randomName);
        $name = $nameParts[0];
        $surname = $nameParts[1];

        if (!\count($nameParts) == 3) {
            $surname .= ' ' . $nameParts[2];
        }

        $emailBasedOnName = \implode('_', array_map('strtolower', $nameParts)) . '@gmail.com';
        $nicknameBasedOnName = (\strtolower($nameParts[0]) . '-' . \strtolower($nameParts[1]));

        $user = new User();
        $user->setName($name);
        $user->setSurnames($surname);
        $user->setEmail($emailBasedOnName);
        $user->setPassword($this->encoder->encodePassword($user, self::DEFAULT_PASSWORD));
        $user->setNickname($nicknameBasedOnName);
        $manager->persist($user);
    }

    private function createAdminUser(ObjectManager $manager): void
    {
        $user = new User();

        $user->setName('Dani');
        $user->setSurnames('Cristante Gonzalez');
        $user->setEmail('daniel@admin.com');
        $user->setPassword($this->encoder->encodePassword($user, 'admin1234'));
        $user->setNickname('dani.cristante');
        $manager->persist($user);
    }
}