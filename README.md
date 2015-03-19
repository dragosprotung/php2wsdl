# PHP2WSDL

[![Latest Version](https://img.shields.io/github/tag/dragosprotung/php2wsdl.svg?style=flat-square)](https://github.com/dragosprotung/php2wsdl/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/dragosprotung/php2wsdl/master.svg?style=flat-square)](https://travis-ci.org/dragosprotung/php2wsdl)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/dragosprotung/php2wsdl.svg?style=flat-square)](https://scrutinizer-ci.com/g/dragosprotung/php2wsdl/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/dragosprotung/php2wsdl.svg?style=flat-square)](https://scrutinizer-ci.com/g/dragosprotung/php2wsdl)
[![Total Downloads](https://img.shields.io/packagist/dt/php2wsdl/php2wsdl.svg?style=flat-square)](https://packagist.org/packages/php2wsdl/php2wsdl)

Create WSDL files form PHP classes.

## Install

Via Composer

``` bash
$ composer require php2wsdl/php2wsdl
```

## Usage

``` php
$class = "Vendor\\MyClass";
$serviceURI = "http://www.myservice.com/soap";
$wsdlGenerator = new PHPClass2WSDL($class, $serviceURI);
// Generate thw WSDL from the class adding only the public methods that have @soap annotation.
$wsdlGenerator->generateWSDL(true);
$wsdlXML = $wsdlGenerator->dump();
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover any security related issues, please email instead of using the issue tracker.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
