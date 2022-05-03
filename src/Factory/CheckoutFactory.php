<?php

namespace App\Factory;

use App\Entity\Checkout;
use App\Repository\CheckoutRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Checkout>
 *
 * @method static Checkout|Proxy createOne(array $attributes = [])
 * @method static Checkout[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Checkout|Proxy find(object|array|mixed $criteria)
 * @method static Checkout|Proxy findOrCreate(array $attributes)
 * @method static Checkout|Proxy first(string $sortedField = 'id')
 * @method static Checkout|Proxy last(string $sortedField = 'id')
 * @method static Checkout|Proxy random(array $attributes = [])
 * @method static Checkout|Proxy randomOrCreate(array $attributes = [])
 * @method static Checkout[]|Proxy[] all()
 * @method static Checkout[]|Proxy[] findBy(array $attributes)
 * @method static Checkout[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Checkout[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static CheckoutRepository|RepositoryProxy repository()
 * @method Checkout|Proxy create(array|callable $attributes = [])
 */
final class CheckoutFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'accountHolderName' => self::faker()->text(),
            'cardNumber' => self::faker()->text(),
            'expiryDate' => self::faker()->datetime(),
            'securityCode' => self::faker()->randomNumber(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Checkout $checkout): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Checkout::class;
    }
}
