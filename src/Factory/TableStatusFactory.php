<?php

namespace App\Factory;

use App\Entity\TableStatus;
use App\Repository\TableStatusRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<TableStatus>
 *
 * @method static TableStatus|Proxy createOne(array $attributes = [])
 * @method static TableStatus[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static TableStatus|Proxy find(object|array|mixed $criteria)
 * @method static TableStatus|Proxy findOrCreate(array $attributes)
 * @method static TableStatus|Proxy first(string $sortedField = 'id')
 * @method static TableStatus|Proxy last(string $sortedField = 'id')
 * @method static TableStatus|Proxy random(array $attributes = [])
 * @method static TableStatus|Proxy randomOrCreate(array $attributes = [])
 * @method static TableStatus[]|Proxy[] all()
 * @method static TableStatus[]|Proxy[] findBy(array $attributes)
 * @method static TableStatus[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static TableStatus[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static TableStatusRepository|RepositoryProxy repository()
 * @method TableStatus|Proxy create(array|callable $attributes = [])
 */
final class TableStatusFactory extends ModelFactory
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
            'name' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(TableStatus $tableStatus): void {})
        ;
    }

    protected static function getClass(): string
    {
        return TableStatus::class;
    }
}
