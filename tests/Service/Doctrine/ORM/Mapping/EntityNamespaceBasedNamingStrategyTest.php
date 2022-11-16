<?php

namespace App\Tests\Service\Doctrine\ORM\Mapping;

use App\Service\Doctrine\ORM\Mapping\EntityNamespaceBasedNamingStrategy;
use PHPUnit\Framework\TestCase;

class EntityNamespaceBasedNamingStrategyTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testClassToTableName($inputClassName, $expectedTableName)
    {
        $namingStrategy = new EntityNamespaceBasedNamingStrategy('App\\Entity\\');
        $actualTableName = $namingStrategy->classToTableName($inputClassName);
        $this->assertSame($expectedTableName, $actualTableName);
    }

    public function dataProvider(): array
    {
        return [
            ['App\\Entity\\Tracker\\Event', 'tracker$events'],
            ['App\\Entity\\Tracker\\EventType', 'tracker$event_types'],
        ];
    }
}
