# Content Blocks

[![Latest Version on Packagist](https://img.shields.io/packagist/v/axeldotdev/content-blocks.svg?style=flat-square)](https://packagist.org/packages/axeldotdev/content-blocks)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/axeldotdev/content-blocks/run-tests?label=tests)](https://github.com/axeldotdev/content-blocks/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/axeldotdev/content-blocks/Check%20&%20fix%20styling?label=code%20style)](https://github.com/axeldotdev/content-blocks/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/axeldotdev/content-blocks.svg?style=flat-square)](https://packagist.org/packages/axeldotdev/content-blocks)
[![License](https://img.shields.io/packagist/l/axeldotdev/content-blocks.svg?style=flat-square)](https://packagist.org/packages/axeldotdev/content-blocks)

A Laravel Nova field for flexible content blocks.

## Installation

You can install the package via composer:

```bash
composer require --dev axeldotdev/content-blocks
```

The minimum PHP version required is **8.1**.

## Usage

You can use it like that:

```php
ContentBlocks::make('Content')
    ->addButtonLabel('Add block')
    ->blocks([
        Block::make('Text')
            ->fields([])
            ->template(resource_path('views/blocks/text.blade.php')),

        Block::make('Image')
            ->fields([])
            ->template(resource_path('views/blocks/image.blade.php')),

        Block::make('Video')
            ->fields([])
            ->template(resource_path('views/blocks/video.blade.php')),
    ]),
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Axel Charpentier](https://github.com/axeldotdev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
