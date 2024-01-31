<?php

declare(strict_types=1);

use Kalider\PhpSebGenerator\SebConfigGenerator;
use PHPUnit\Framework\TestCase;

final class SebConfigGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        if (is_file(__DIR__ .'/output/test.seb')) {
            unlink(__DIR__ .'/output/test.seb');
        }
    }

    public function testCreateSebConfig(): void
    {
        $config = file_get_contents(__DIR__ . '/../examples/example-seb-config.json'); // just as example...
        $startPassword = 'test';
        $quitPassword = 'test';
        $adminPassword = 'test';

        $sebConfig = json_decode($config, true);

        $generator = new SebConfigGenerator();
        $encryptedSebConfig = $generator->createSebConfig($sebConfig, $startPassword, $quitPassword, $adminPassword);

        $this->assertIsString($encryptedSebConfig);
    }

    public function testGenerate(): void
    {
        $config = file_get_contents(__DIR__ . '/../examples/example-seb-config.json'); // just as example...
        $startPassword = 'test';
        $quitPassword = 'test';
        $adminPassword = 'test';

        $sebConfig = json_decode($config, true);

        $encryptedSebConfig = SebConfigGenerator::generate($sebConfig, $startPassword, $quitPassword, $adminPassword);

        $this->assertIsString($encryptedSebConfig);
    }

    public function testGenerateToFile(): void
    {
        $config = file_get_contents(__DIR__ . '/../examples/example-seb-config.json'); // just as example...
        $startPassword = 'test';
        $quitPassword = 'test';
        $adminPassword = 'test';

        $sebConfig = json_decode($config, true);
        $path = __DIR__ . '/output/test.seb';
        $created = SebConfigGenerator::generateToFile($sebConfig, $path, $startPassword, $quitPassword, $adminPassword);

        $this->assertTrue($created);
        $this->assertTrue(is_file($path));
    }
}
