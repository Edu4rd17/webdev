<?php

namespace App\Factory;

use App\Entity\Table;
use App\Repository\TableRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Table>
 *
 * @method static Table|Proxy createOne(array $attributes = [])
 * @method static Table[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Table|Proxy find(object|array|mixed $criteria)
 * @method static Table|Proxy findOrCreate(array $attributes)
 * @method static Table|Proxy first(string $sortedField = 'id')
 * @method static Table|Proxy last(string $sortedField = 'id')
 * @method static Table|Proxy random(array $attributes = [])
 * @method static Table|Proxy randomOrCreate(array $attributes = [])
 * @method static Table[]|Proxy[] all()
 * @method static Table[]|Proxy[] findBy(array $attributes)
 * @method static Table[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Table[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static TableRepository|RepositoryProxy repository()
 * @method Table|Proxy create(array|callable $attributes = [])
 */
final class TableFactory extends ModelFactory
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
            'number' => self::faker()->randomNumber(),
            'capacity' => self::faker()->randomNumber(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Table $table): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Table::class;
    }
}
