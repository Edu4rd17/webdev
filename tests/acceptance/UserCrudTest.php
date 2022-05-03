<?php

namespace App\Tests;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UserCrudTest extends WebTestCase
{
    public function testRoleAdminUserCanSeeUserList(): void
    {
        // Arrange
        $method = 'GET';
        $url = '/user';
        $userEmail = 'admin@gmail.com';
        $okay200Code = Response::HTTP_OK;

        // create client that automatically follow re-directs
        $client = static::createClient();
        $client->followRedirects();

        // Login user
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail($userEmail);
        $client->loginUser($testUser);

        // Act
        $crawler = $client->request($method, $url);

        // Assert
        $this->assertResponseIsSuccessful();
        $responseCode = $client->getResponse()->getStatusCode();
        $this->assertSame($okay200Code, $responseCode);

        $expectedText = 'User index';
        $contentSelector = 'body h1';
        $this->assertSelectorTextContains($contentSelector, $expectedText);
    }

    public function testRoleUserCanNotSeeUserList(): void
    {
        // Arrange
        $method = 'GET';
        $url = '/user';
        $userEmail = 'Eduard@gmail.com';
        $accessDeniedResponseCode403 = Response::HTTP_FORBIDDEN;

        // create client that automatically follow re-directs
        $client = static::createClient();
        $client->followRedirects();

        // login user
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail($userEmail);
        $client->loginUser($testUser);

        // Act
        $crawler = $client->request($method, $url);

        // Assert
        $responseCode = $client->getResponse()->getStatusCode();
        $this->assertSame($accessDeniedResponseCode403, $responseCode);
    }
}