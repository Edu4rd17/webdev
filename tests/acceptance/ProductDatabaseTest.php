<?php

namespace App\Tests;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductDatabaseTest extends WebTestCase
{
    public function testNumberOfProductMatchFixtures(): void
    {
        $client = static::createClient();
        $productRepository = static::getContainer()->get(ProductRepository::class);
        $expectedNumberOfEntities = 11;

        $productEntities = $productRepository->findAll();

        $this->assertCount($expectedNumberOfEntities, $productEntities);
    }
}