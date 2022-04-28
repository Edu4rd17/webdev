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
}
