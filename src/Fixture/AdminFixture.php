<?php

declare(strict_types=1);

namespace App\Fixture;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixture extends Fixture
{

// php bin/console doctrine:fixtures:load --append --group=AdminFixture

    public function __construct(
        private UserPasswordHasherInterface $hasher
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        $this->createAdmin($manager);
    }

    private function createAdmin(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setUsername('Inna');
        $admin->setRoles([User::ROLE_ADMIN]);
        $admin->setPassword($this->hasher->hashPassword($admin, '123456'));

        $manager->persist($admin);
        $manager->flush();
    }
}