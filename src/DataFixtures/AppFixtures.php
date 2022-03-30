<?php

namespace App\DataFixtures;

use App\Factory\ProductFactory;
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

        UserFactory::createOne([
            'firstname' => 'Eduard',
            'lastname' => 'Eduard',
            'username' => 'john',
            'password' => '11111111',
            'email' => 'Eduard@gmail.com',
            'phone' => '646356456456',
            'role' => 'ROLE_USER'
        ]);

        ProductFactory::createOne([
            'product_name' => 'Steak',
            'product_price' => 14.99,
            'is_available'=> true,
            'product_description' => 'Delicious steak with vegetables.'
        ]);

        ProductFactory::createOne([
            'product_name' => 'Pancakes',
            'product_price' => 6.99,
            'is_available'=> true,
            'product_description' => 'Delicious steak with vegetables.'
        ]);

        ProductFactory::createOne([
            'product_name' => 'Soup',
            'product_price' => 4.99,
            'is_available'=> false,
            'product_description' => 'Delicious steak with vegetables.'
        ]);

    }
}
