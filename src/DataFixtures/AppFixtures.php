<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\ProductFactory;
use App\Factory\ReservationFactory;
use App\Factory\TableStatusFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Factory\UserFactory;

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

        UserFactory::createOne([
            'firstname' => 'Manager',
            'lastname' => 'Manager',
            'username' => 'manager',
            'password' => '11111111',
            'email' => 'Edua@gmail.com',
            'phone' => '0892443348',
            'role' => 'ROLE_MANAGER'
        ]);

        UserFactory::createOne([
            'firstname' => 'Chef',
            'lastname' => 'Chef',
            'username' => 'chef',
            'password' => '11111111',
            'email' => 'chef@gmail.com',
            'phone' => '0892443348',
            'role' => 'ROLE_CHEF'
        ]);

        $entree = CategoryFactory::createOne([
            'category_type' => 'Entree'
        ]);

        $main = CategoryFactory::createOne([
            'category_type' => 'Main'
        ]);

        $dessert = CategoryFactory::createOne([
            'category_type' => 'Deserts'
        ]);

        ProductFactory::createOne([
            'product_name' => 'Steak',
            'product_price' => 14.99,
            'is_available' => true,
            'product_description' => 'Delicious steak with vegetables.',
            'category' => $entree
        ]);

        ProductFactory::createOne([
            'product_name' => 'Pancakes',
            'product_price' => 6.99,
            'is_available' => true,
            'product_description' => 'Delicious steak with vegetables.',
            'category' => $dessert
        ]);

        ProductFactory::createOne([
            'product_name' => 'Soup',
            'product_price' => 4.99,
            'is_available' => false,
            'product_description' => 'Delicious steak with vegetables.',
            'category' => $main
        ]);

        $tableAvailable = TableStatusFactory::createOne([
            'name' => 'Available'
        ]);

        $tableUnavailable = TableStatusFactory::createOne([
            'name' => 'Unavailable'
        ]);

        $tableReserved = TableStatusFactory::createOne([
            'name' => 'Reserved'
        ]);

        ReservationFactory::createOne([
            'tableNumber' => '1',
            'tableCapacity' => '4',
            'tableStatus' => $tableAvailable
        ]);

        ReservationFactory::createOne([
            'tableNumber' => '2',
            'tableCapacity' => '4',
            'tableStatus' => $tableUnavailable
        ]);

        ReservationFactory::createOne([
            'tableNumber' => '3',
            'tableCapacity' => '6',
            'tableStatus' => $tableReserved
        ]);

        ReservationFactory::createOne([
            'tableNumber' => '4',
            'tableCapacity' => '2',
            'tableStatus' => $tableAvailable
        ]);

        ReservationFactory::createOne([
            'tableNumber' => '5',
            'tableCapacity' => '8',
            'tableStatus' => $tableAvailable
        ]);
    }
}
