<?php

namespace App\Service\Doctrine\ORM\Mapping;

use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;

class EntityNamespaceBasedNamingStrategy extends UnderscoreNamingStrategy
{
    private const NUMBER_AWARE_PATTERN = '/(?<=[a-z0-9])([A-Z])/';

    private string $pattern;
    private int $case;
    private string $entityPrefix;

    public function __construct(string $entityPrefix)
    {
        parent::__construct(case: CASE_LOWER, numberAware: true);
        $this->entityPrefix = $entityPrefix;
        $this->pattern = self::NUMBER_AWARE_PATTERN;
        $this->case = CASE_LOWER;
    }

    public function classToTableName($className): string
    {
        // Removing 'App\Entity\' prefix
        $tableName = str_starts_with($className, $this->entityPrefix)
            ? substr($className, strlen($this->entityPrefix)) : $className;

        // Replacing '\' with '.'
        $tableName = str_replace('\\', '$', $tableName);

        // Adding 's' for Plural Name
        $tableName .= 's';

        // Converting camelCase with snake_case
        $tableName = $this->underscore($tableName);

        return strtolower($tableName);
    }

    private function underscore(string $string): string
    {
        $string = preg_replace($this->pattern, '_$1', $string);

        if ($this->case === CASE_UPPER) {
            return strtoupper($string);
        }

        return strtolower($string);
    }
}
