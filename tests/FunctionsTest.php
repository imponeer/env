<?php
namespace Imponeer\Env\Tests;

use Faker\Factory;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Tests functions.php functionality
 */
class FunctionsTest extends TestCase
{
    final public function testEnvFunctionExists(): void
    {
        $this->assertTrue(
            function_exists('env'),
            'env function doesn\'t exist'
        );
    }

    final public function testEnvNonExistedVarReturning(): void
    {
        $faker = Factory::create();
        $envVariableName = 'VAR_' . $faker->word();
        putenv("$envVariableName=");
        $this->assertNull(
            env($envVariableName),
            "Default returned value for not existing env var should be null"
        );
        $randStr = $faker->text();
        $this->assertSame(
            $randStr,
            env($envVariableName, $randStr),
            "If default value for non existing env var specified, that value should be returned"
        );
    }

    /**
     * @return array<array{envValue: string, parseValue: mixed}>
     */
    final public static function provideEnvTestParsingData(): array
    {
        $faker = Factory::create();

        $no = $faker->numberBetween();
        $str = $faker->text();
        $no2 = round($faker->randomFloat(), 5);

        return [
            [
                'envValue' => 'true',
                'parseValue' => true
            ],
            [
                'envValue' => 'false',
                'parseValue' => false
            ],
            [
                'envValue' => $no . '',
                'parseValue' => $no
            ],
            [
                'envValue' => $str,
                'parseValue' => $str
            ],
            [
                'envValue' => 'null',
                'parseValue' => null
            ],
            [
                'envValue' => $no2 . '',
                'parseValue' => $no2
            ],
        ];
    }

    #[DataProvider('provideEnvTestParsingData')]
    final public function testEnvBoolTrue(string $envValue, mixed $parseValue): void {
        $faker = Factory::create();
        $envVariableName = 'VAR_' . $faker->word();
        putenv("$envVariableName=$envValue");
        $this->assertEquals(
            $parseValue,
            env($envVariableName, 'a'),
            "Incorrect parsed value"
        );
    }

}
