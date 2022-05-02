<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\OrderFactory;
use App\Factory\OrderStatusFactory;
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
            'role' => 'ROLE_CUSTOMER'
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

        UserFactory::createOne([
            'firstname' => 'Waiter',
            'lastname' => 'Waiter',
            'username' => 'waiter',
            'password' => '11111111',
            'email' => 'waiter@gmail.com',
            'phone' => '0892443348',
            'role' => 'ROLE_WAITER'
        ]);

        $entree = CategoryFactory::createOne([
            'category_type' => 'Entree'
        ]);

        $main = CategoryFactory::createOne([
            'category_type' => 'Main'
        ]);

        $dessert = CategoryFactory::createOne([
            'category_type' => 'Dessert'
        ]);

        ProductFactory::createOne([
            'product_name' => 'Steak',
            'product_price' => 14.99,
            'is_available' => true,
            'product_description' => 'Delicious steak with vegetables.',
            'image' => 'steak.png',
            'category' => $entree
        ]);

        ProductFactory::createOne([
            'product_name' => 'Pancakes',
            'product_price' => 6.99,
            'is_available' => true,
            'product_description' => 'Delicious dessert with vegetables.',
            'image' => 'pancakes.png',
            'category' => $dessert
        ]);

        ProductFactory::createOne([
            'product_name' => 'Pizza',
            'product_price' => 4.99,
            'is_available' => false,
            'product_description' => 'Delicious pizza ith vegetables.',
            'image' => 'pizza.png',
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

//        $cooking = OrderStatusFactory::createOne([
//            'status_name' => 'Cooking'
//        ]);
//
//        $plated = OrderStatusFactory::createOne([
//            'status_name' => 'Plated(to be served)'
//        ]);
//
//        $served = OrderStatusFactory::createOne([
//            'status_name' => 'Served(to be paid)'
//        ]);
//
//        $paid = OrderStatusFactory::createOne([
//            'status_name' => 'Paid'
//        ]);
//
//        OrderFactory::createOne([
//            'name' => 'Pizza Margarita',
//            'type' => $main,
//            'time_placed' =>\DateTimeInterface::RFC1123,
//            'order_status' => $cooking
//        ]);
//
//        OrderFactory::createOne([
//            'name' => 'Steak',
//            'type' => $main,
//            'time_placed' =>\DateTimeInterface::RFC1123,
//            'order_status' => $cooking
//        ]);
//
//        OrderFactory::createOne([
//            'name' => 'Pancakes',
//            'type' => $dessert,
//            'time_placed' =>\DateTimeInterface::RFC1123,
//            'order_status' => $cooking
//        ]);


    }
}
