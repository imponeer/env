<?php
namespace Imponeer\Env\Tests;

use Faker\Factory;
use PHPUnit\Framework\TestCase;

/**
 * Tests functions.php functionality
 */
class FunctionsTest extends TestCase
{
    public function testEnvFunctionExists(): void
    {
        $this->assertTrue(
            function_exists('env'),
            'env function doesn\'t exist'
        );
    }

    public function testEnvNonExistedVarReturning(): void
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

    public function getEnvTestParsingData() {
        $faker = Factory::create();

        $no = $faker->numberBetween();
        $str = $faker->text();
        $no2 = round(
            $faker->randomFloat(),
            7 // because max possible precision is 7 right now
        );

        return [
            ['true', true],
            ['false', false],
            [$no . '', $no],
            [$str, $str],
            ['null', null],
            [$no2 . '', $no2],
        ];
    }

    /**
     * @dataProvider getEnvTestParsingData
     */
    public function testEnvBoolTrue($envValue, $parseValue): void {
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
