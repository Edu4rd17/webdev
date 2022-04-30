<?php

namespace App\Tests\unit;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomepageTest extends WebTestCase
{
    public function testHomePageTitleText(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Welcome to BistroLoco!');
    }

    public function testPublicUserCanSeeWelcomeBackMessageWhenLoggedIn(): void
    {
        $client = static::createClient();

        //log in as admin
        $userEmail = 'Eduard@gmail.com';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail($userEmail);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('section', 'We are so glad you are back. We missed you!');
    }

    public function testUserCanNotSeeLoginRegisterLinksWhenLoggedIn(): void
    {
        $client = static::createClient();

        //log in as normal user
        $userEmail = 'Eduard@gmail.com';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail($userEmail);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/');

        $contentSelector = '#login_link';
        $contentSelector1 = '#register_link';
        $this->assertSelectorNotExists($contentSelector, $contentSelector1);
    }

    public function testUserCanSeeLoginRegisterLinksWhenNotLoggedIn(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $contentSelector = '#login_link';
        $contentSelector1 = '#register_link';
        $this->assertSelectorExists($contentSelector, $contentSelector1);
    }
}