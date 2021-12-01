<?php

namespace Stripe;

/**
 * This class exists so that the test suite is compatible with both
 * phpunit@5.7 as well as on phpunit@9.0.
 *
 * The reason for this is because newer versions of phpunit are
 * incompatible with PHP<=7.2, but PHP8 is incompatible with phpunit5.6.
 *
 * We can remove this class and these methods when we drop support for PHP 7.2 and all earlier versions.
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    public static function compatAssertIsArray($obj)
    {
        if (method_exists(static::class, 'assertIsArray')) {
            static::assertIsArray($obj);
        } else {
            // @phpstan-ignore-next-line
            static::assertInternalType('array', $obj);
        }
    }

    public function compatExpectExceptionMessageMatches($msg)
    {
        if (method_exists($this, 'expectExceptionMessageMatches')) {
            $this->expectExceptionMessageMatches($msg);
        } else {
            // @phpstan-ignore-next-line
            $this->expectExceptionMessageRegExp($msg);
        }
    }

    public static function compatAssertStringContainsString($a, $b)
    {
        if (method_exists(static::class, 'assertStringContainsString')) {
            static::assertStringContainsString($a, $b);
        } else {
            static::assertContains($a, $b);
        }
    }

    public function compatAssertIsString($x)
    {
        if (method_exists($this, 'assertIsString')) {
            static::assertIsString($x);
        } else {
            // @phpstan-ignore-next-line
            static::assertInternalType('string', $x);
        }
    }

    public static function compatWarningClass()
    {
        if (class_exists('\PHPUnit\Framework\Error\Warning')) {
            return \PHPUnit\Framework\Error\Warning::class;
        }

        // @phpstan-ignore-next-line
        return \PHPUnit_Framework_Error_Warning::class;
    }
}