<?php
declare(strict_types=1);

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigTest;

final class TypeExtension extends AbstractExtension
{
    public function getTests(): array
    {
        return ['of_type' => new TwigTest('of_type', [$this, 'ofType'])];
    }

    /**
     * @param mixed $var
     * @param string $test
     * @param string|null $class
     * @return bool
     */
    public function ofType($var, string $test, string $class = null): bool
    {
        switch ($test) {
            case 'array':
                return is_array($var);

            case 'bool':
                return is_bool($var);

            case 'object':
                return is_object($var);

            case 'class':
                return is_object($var) && $class === get_class($var);

            case 'float':
                return is_float($var);

            case 'int':
                return is_int($var);

            case 'numeric':
                return is_numeric($var);

            case 'scalar':
                return is_scalar($var);

            case 'string':
                return is_string($var);

            default:
                throw new \InvalidArgumentException(sprintf('Invalid "%s" type test.', $test));
        }
    }
}
