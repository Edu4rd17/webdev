<?php

namespace App\DataFixtures;

use App\Factory\BookingFactory;
use App\Factory\CategoryFactory;
use App\Factory\OrderFactory;
use App\Factory\OrderStatusFactory;
use App\Factory\ProductFactory;
use App\Factory\ReservationFactory;
use App\Factory\TableFactory;
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

        $starters = CategoryFactory::createOne([
            'category_type' => 'Starters'
        ]);

        $main = CategoryFactory::createOne([
            'category_type' => 'Main'
        ]);

        $dessert = CategoryFactory::createOne([
            'category_type' => 'Dessert'
        ]);

        $drinks = CategoryFactory::createOne([
            'category_type' => 'Drinks'
        ]);

        ProductFactory::createOne([
            'product_name' => 'Antipasto platter',
            'product_price' => 10.99,
            'is_available' => true,
            'product_description' => 'Fine antipasto with all the favourites, then share them with a winning double of homemade dips.',
            'image' => 'antipasto.jpeg',
            'category' => $starters
        ]);

        ProductFactory::createOne([
            'product_name' => 'Chicken and spinach dumplings',
            'product_price' => 7.99,
            'is_available' => true,
            'product_description' => 'Amazing chicken and spinach dumplings to share with your loved ones.',
            'image' => 'chicken.jpeg',
            'category' => $starters
        ]);

        ProductFactory::createOne([
            'product_name' => 'Crispy bocconcini with tomato chilli sauce',
            'product_price' => 11.99,
            'is_available' => true,
            'product_description' => 'Creamy bocconcini is golden fried for an enticing crunch, and served with a spicy tomato dip.',
            'image' => 'crispy-bocconcini.jpeg',
            'category' => $starters
        ]);

        ProductFactory::createOne([
            'product_name' => 'Steak',
            'product_price' => 14.99,
            'is_available' => true,
            'product_description' => 'Delicious steak with vegetables.',
            'image' => 'steak.jpg',
            'category' => $main
        ]);

        ProductFactory::createOne([
            'product_name' => 'Roast duck with Marsala gravy',
            'product_price' => 13.99,
            'is_available' => true,
            'product_description' => 'This crispy roast duck is a fuss-free alternative to the traditional Sunday roast.',
            'image' => 'duck.jpg',
            'category' => $main
        ]);

        ProductFactory::createOne([
            'product_name' => 'Pizza',
            'product_price' => 7.99,
            'is_available' => false,
            'product_description' => 'Delicious pizza with an amazing tomato sauce.',
            'image' => 'pizza.jpg',
            'category' => $main
        ]);

        ProductFactory::createOne([
            'product_name' => 'Pancakes',
            'product_price' => 4.99,
            'is_available' => true,
            'product_description' => 'Delicious pancakes with nutella sauce and pieces of strawberry.',
            'image' => 'pancakes.jpg',
            'category' => $dessert
        ]);

        ProductFactory::createOne([
            'product_name' => 'White Whine',
            'product_price' => 8.99,
            'is_available' => true,
            'product_description' => 'Old age wine. Perfect with our food.',
            'image' => 'wine.jpg',
            'category' => $drinks
        ]);

        ProductFactory::createOne([
            'product_name' => 'Apple Juice',
            'product_price' => 4.50,
            'is_available' => true,
            'product_description' => 'Flavourful apple juice.',
            'image' => 'apple.jpeg',
            'category' => $drinks
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

        TableFactory::createOne([
            'number' => 1,
            'capacity' => 2,
            'status' => $tableAvailable
        ]);
        TableFactory::createOne([
            'number' => 2,
            'capacity' => 3,
            'status' => $tableAvailable
        ]);
        TableFactory::createOne([
            'number' => 3,
            'capacity' => 4,
            'status' => $tableAvailable
        ]);
        TableFactory::createOne([
            'number' => 4,
            'capacity' => 4,
            'status' => $tableAvailable
        ]);
        TableFactory::createOne([
            'number' => 5,
            'capacity' => 8,
            'status' => $tableAvailable
        ]);

        $cooking = OrderStatusFactory::createOne([
            'status_name' => 'Cooking'
        ]);

        $plated = OrderStatusFactory::createOne([
            'status_name' => 'Plated(to be served)'
        ]);

        $served = OrderStatusFactory::createOne([
            'status_name' => 'Served(to be paid)'
        ]);

        $paid = OrderStatusFactory::createOne([
            'status_name' => 'Paid'
        ]);

    }
}
