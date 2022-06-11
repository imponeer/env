[![License](https://img.shields.io/github/license/imponeer/env.svg)](LICENSE)
[![GitHub release](https://img.shields.io/github/release/imponeer/env.svg)](https://github.com/imponeer/env/releases) [![PHP](https://img.shields.io/packagist/php-v/imponeer/env.svg)](http://php.net)
[![Packagist](https://img.shields.io/packagist/dm/imponeer/env.svg)](https://packagist.org/packages/imponeer/env)

# ENV

Small helper dealing with environment variables.

## Installation

To install and use this package, we recommend to use [Composer](https://getcomposer.org):

```bash
composer require imponeer/env
```

Otherwise, you need to include manually files from `src/` directory.

## Usage example

```php
$path = env('PATH', '/src');
$enable = !!env('ENABLE_APP');
```

## How to contribute?

If you want to add some functionality or fix bugs, you can fork, change and create pull request. If you not sure how this works, try [interactive GitHub tutorial](https://try.github.io).

If you found any bug or have some questions, use [issues tab](https://github.com/imponeer/env/issues) and write there your questions.
