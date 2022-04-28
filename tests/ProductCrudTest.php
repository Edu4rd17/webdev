<?php

namespace App\Tests;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductCrudTest extends WebTestCase
{
    public function testHomePageTitleText(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Welcome to BistroLoco!');
    }

    public function testPublicUserCanNotSeeNewProductLink(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/product');

        $contentSelector = '#new_product_link';
        $this->assertSelectorNotExists($contentSelector);
    }

    public function testRoleAdminUserCanSeeNewProductLink(): void
    {
        $client = static::createClient();

        //log in as admin
        $userEmail = 'admin@gmail.com';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail($userEmail);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/product');


        $contentSelector = '#new_product_link';
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


//    public function testRoleAdminCanAddProduct(): void
//    {
//        // Arrange - create client
//        $client = static::createClient();
//        $client->followRedirects();
//
//        // Arrange - get repository references
//        $productRepository = static::getContainer()->get(ModuleRepository::class);
//        $userRepository = static::getContainer()->get(UserRepository::class);
//        $lecturerRepository = static::getContainer()->get(LecturerRepository::class);
//
//        // Arrange - get admin user - from fixtures
//        $userEmail = 'admin@admin.com';
//        $adminUser = $userRepository->findOneByEmail($userEmail);
//
//        // Arrange - get Matt lecturer - from fixtures
//        $lecturerName = 'Matt Smith';
//        $lecturer = $lecturerRepository->findOneByName($lecturerName);
//
//        // Arrange - request parameters
//        $httpMethod = 'GET';
//        $url = '/module/new';
//
//        // Arrange - count number modules BEFORE adding
//        $modules = $moduleRepository->findAll();
//        $numberOfModulesBeforeOneCreated = count($modules);
//        $expectedNumberOfModulesAfterOneCreated = $numberOfModulesBeforeOneCreated + 1;
//
//        // Act - login as ADMIN user
//        $client->loginUser($adminUser);
//
//        // Act - fill in form to create new module
//        $submitButtonName = 'Save';
//        $client->submit($client->request($httpMethod, $url)->selectButton($submitButtonName)->form([
//            'module[title]'  => 'Test Module',
//            'module[credits]'  => '10',
//            'module[lecturer]'  => $lecturer->getId(), // need to submit ID of lecturer, not name, since a related object
//        ]));
//
//        // Act - get array of modules AFTER adding
//        $modules = $moduleRepository->findAll();
//
//        // Assert
//        $this->assertCount($expectedNumberOfModulesAfterOneCreated, $modules);
//    }

}
