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

    final public static function provideEnvTestParsingData(): array
    {
        $faker = Factory::create();

        $no = $faker->numberBetween();
        $str = $faker->text();
        $no2 = round($faker->randomFloat(), 5);

        return [
            ['true', true],
            ['false', false],
            [$no . '', $no],
            [$str, $str],
            ['null', null],
            [$no2 . '', $no2],
        ];
    }

    #[DataProvider('provideEnvTestParsingData')]
    final public function testEnvBoolTrue(string $envValue, mixed$parseValue): void {
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
