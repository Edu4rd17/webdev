<?php

namespace App\Tests;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ProductCrudTest extends WebTestCase
{
    public function testMenuPageTitleText(): void
    {
        $client = static::createClient();
        $client->followRedirects();
        $crawler = $client->request('GET', '/product/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Lets see the menu!');
    }

    public function testPublicUserCanNotSeeNewProductLink(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/product/');

        $contentSelector = '#new_product_link';
        $this->assertSelectorNotExists($contentSelector);
    }

    public function testRoleChefUserCanSeeNewProductLink(): void
    {
        $client = static::createClient();

        //log in as admin
        $userEmail = 'chef@gmail.com';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail($userEmail);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/product/');

        $contentSelector = '#new_product_link';
        $this->assertSelectorExists($contentSelector);
    }

    public function testUserCanNotSeeAddToBasketLinkUnlessLoggedIn(): void
    {
        $client = static::createClient();

        //log in as normal user
        $userEmail = 'Eduard@gmail.com';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail($userEmail);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/product/');

        $contentSelector = '#add_to_basket_link';
        $this->assertSelectorExists($contentSelector);
    }

    public function testAccessDeniedForRoleUserWhenTryAccessNewProduct(): void
    {
        $client = static::createClient();
        $client->followRedirects();
        $client->catchExceptions(true);

        // login as ROLE_USER user
        $userEmail = 'Eduard@gmail.com';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail($userEmail);
        $client->loginUser($testUser);

//        $this->expectException(AccessDeniedHttpException::class);

        $crawler = $client->request('GET', '/product/new');
        $statusCode = $client->getResponse()->getStatusCode();

        $this->assertSame(Response::HTTP_FORBIDDEN, $statusCode);
    }


//    public function testRoleChefCanAddProduct(): void
//    {
//        // Arrange - create client
//        $client = static::createClient();
//        $client->followRedirects();
//
//        // Arrange - get repository references
//        $productRepository = static::getContainer()->get(ProductRepository::class);
//        $userRepository = static::getContainer()->get(UserRepository::class);
//        $categoryRepository = static::getContainer()->get(CategoryRepository::class);
//
//        // Arrange - get admin user - from fixtures
//        $userEmail = 'chef@gmail.com';
//        $chefUser = $userRepository->findOneByEmail($userEmail);
//
//        // Arrange - get Main category - from fixtures
//        $categoryType = 'Main';
//        $category = $categoryRepository->findOneByCategoryType($categoryType);
//
//        // Arrange - request parameters
//        $httpMethod = 'GET';
//        $url = '/product/new';
//
//        // Arrange - count number modules BEFORE adding
//        $products = $productRepository->findAll();
//        $numberOfProductsBeforeOneCreated = count($products);
//        $expectedNumberOfProductsAfterOneCreated = $numberOfProductsBeforeOneCreated + 1;
//
//        // Act - login as ADMIN user
//        $client->chefUser($adminUser);
//
//        // Act - fill in form to create new module
//        $submitButtonName = 'Save';
//        $client->submit($client->request($httpMethod, $url)->selectButton($submitButtonName)->form([
//            'product[productName]' => 'Food Test',
//            'product[productPrice]' => '11.99',
//            'product[isAvailable]' => true,
//            'product[productDescription]' => 'Amazing food Test',
//            'product[category]' => $category->getId(), // need to submit ID of category, not name, since a related object
//        ]));
//
//        // Act - get array of product AFTER adding
//        $products = $productRepository->findAll();
//
//        // Assert
//        $this->assertCount($expectedNumberOfProductsAfterOneCreated, $products);
//    }

}