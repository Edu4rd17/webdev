<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Factory\UserFactory;
use App\Factory\MakeFactory;
use App\Factory\PhoneFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'username' => 'admin',
            'password' => '11111111',
            'email' => 'admin@gmail.com',
            'phone' => '0892443348',
            'role' => 'ROLE_ADMIN'
        ]);

//        UserFactory::createOne([
//            'firstname' => 'Eduard',
//            'firstname' => 'Eduard',
//            'username' => 'john',
//            'password' => 'doe',
//            'firstname' => 'Eduard',
//            'firstname' => 'Eduard',
//            'role' => 'ROLE_ADMIN'
//        ]);

    }
}
