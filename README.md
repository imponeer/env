[![License](https://img.shields.io/github/license/imponeer/env.svg)](LICENSE)
[![GitHub release](https://img.shields.io/github/release/imponeer/env.svg)](https://github.com/imponeer/env/releases) [![PHP](https://img.shields.io/packagist/php-v/imponeer/env.svg)](http://php.net)
[![Packagist](https://img.shields.io/packagist/dm/imponeer/env.svg)](https://packagist.org/packages/imponeer/env)

# ENV

A lightweight and efficient PHP helper library for managing environment variables with a clean and simple API.

## Installation

To install this package using [Composer](https://getcomposer.org):

```bash
composer require imponeer/env
```

For manual installation, clone this repository and include the files from the `src/` directory in your project.

## Usage

### Basic Usage

```php
// Get an environment variable with a default value
$path = env('APP_PATH', '/var/www');

// Get a boolean environment variable
$isDebug = (bool) env('APP_DEBUG', false);

// Get an integer value
$port = (int) env('APP_PORT', 8080);
```

## Development

### Testing and Code Quality

This project uses several tools to ensure code quality and reliability. Here are the available commands:

**Run Unit Tests**
Execute the test suite using PHPUnit:
```bash
composer test
```

**Check Code Style**
Verify code adheres to PSR-12 standards:
```bash
composer phpcs
```

**Fix Code Style Issues**
Automatically fix code style violations:
```bash
composer phpcbf
```

**Run Static Analysis**
Perform static code analysis with PHPStan:
```bash
composer phpstan
```



## Contributing

We welcome contributions! Here's how you can help:

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/your-feature-name`
3. Make your changes following PSR-12 coding standards
4. Add tests for your changes
5. Run the test suite: `composer test`
6. Check code style: `composer phpcs`
7. Fix any style issues: `composer phpcbf`
8. Run static analysis: `composer phpstan`
9. Commit your changes: `git commit -m 'Add some feature'`
10. Push to the branch: `git push origin feature/your-feature-name`
11. Open a pull request

### Reporting Issues

Found a bug or have a feature request? Please open an issue on our [GitHub Issues](https://github.com/imponeer/env/issues) page.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
