<img src="https://static.germania-kg.com/logos/ga-logo-2016-web.svgz" width="250px">

------



# Germania KG · Translator



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

