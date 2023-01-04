<img src="https://static.germania-kg.com/logos/ga-logo-2016-web.svgz" width="250px">

------



# Germania KG · Translator


[![Packagist](https://img.shields.io/packagist/v/germania-kg/translator.svg?style=flat)](https://packagist.org/packages/germania-kg/translator)
[![PHP version](https://img.shields.io/packagist/php-v/germania-kg/translator.svg)](https://packagist.org/packages/germania-kg/translator)
[![Tests](https://github.com/GermaniaKG/Translator/actions/workflows/tests.yml/badge.svg)](https://github.com/GermaniaKG/Translator/actions/workflows/tests.yml)


## Installation

```bash
$ composer require germania-kg/translator
```



## Usage

```php
<?php
use Laminas\I18n\Translator\Translator as LaminasTranslator;
use Germania\Translator\LaminasTranslatorCallable;

// Setup your Laminas
$laminas_translator = new LaminasTranslator;

$translator = new LaminasTranslatorCallable($laminas_translator);
echo $translator("MsgId");

// Optionally, add gettext et.al. domain
echo $translator("MsgId", "app");
```



## Development

```bash
$ git clone git@github.com:GermaniaKG/Translator.git
$ cd Translator
$ composer install
```

