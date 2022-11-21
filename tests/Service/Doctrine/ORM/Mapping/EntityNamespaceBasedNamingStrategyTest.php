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
            // Namespace tests
            ['App\\Entity\\Tracker\\Event', 'tracker$events'],
            ['App\\Entity\\Tracker\\EventType', 'tracker$event_types'],

            // English language grammar tests
            ['App\\Entity\\Event', 'events'],
            ['App\\Entity\\Type', 'types'],
            ['App\\Entity\\Status', 'statuses'],
            ['App\\Entity\\Story', 'stories'],
        ];
    }
}
