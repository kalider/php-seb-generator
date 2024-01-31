# PHP SEB Generator

Librari ini menyediakan fitur generate konfigurasi [SEB](https://safeexambrowser.org/news_de.html) (Safe Exam Browser) terenkipsi.

> > Terinspirasi oleh [ndum/laravel-seb](https://github.com/ndum/laravel-seb).

## Requirements

- php7.4 atau terbaru.
- ext-openssl
- ext-zlib

## Installation

Install via composer:

```bash
composer require kalider/php-seb-generator
```

## Examples

Generate to string:

```php
use Kalider\PhpSebGenerator\SebConfigGenerator;

$config = file_get_contents('examples/example-seb-config.json');
$startPassword = 'test';
$quitPassword = 'test';
$adminPassword = 'test';

$sebConfig = json_decode($config, true);

$encryptedSebConfig = SebConfigGenerator::generate($sebConfig, $startPassword, $quitPassword, $adminPassword);
```

Generate to file:

```php
use Kalider\PhpSebGenerator\SebConfigGenerator;

$config = file_get_contents('examples/example-seb-config.json');
$startPassword = 'test';
$quitPassword = 'test';
$adminPassword = 'test';

$sebConfig = json_decode($config, true);
$path = 'output/test.seb';
$created = SebConfigGenerator::generateToFile($sebConfig, $path, $startPassword, $quitPassword, $adminPassword);
```

## Issues / Contributions

Directly via [GitHub](https://github.com/kalider/php-seb-generator/issues)

## License

MIT License - [Detail](LICENSE)
