# Page module
[![Scrutinizer Coverage](https://img.shields.io/scrutinizer/coverage/g/roboapp/news.svg?style=flat-square)](https://scrutinizer-ci.com/g/roboapp/news/?branch=master) [![Scrutinizer](https://img.shields.io/scrutinizer/g/roboapp/news.svg?style=flat-square)](https://scrutinizer-ci.com/g/roboapp/news/?branch=master) [![Build Status](https://img.shields.io/travis/roboapp/news/master.svg?style=flat-square)](https://travis-ci.org/roboapp/news) [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://raw.githubusercontent.com/roboapp/news/master/LICENSE) [![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat-square)](http://www.yiiframework.com/)

News module for Yii2 by Roboapp CMS

## Install

Via Composer

``` bash
$ composer require roboapp/news
```
## Configuration

``` php
    'bootstrap' => [..., 'roboapp\news\Bootstrap', ...],
    'modules' => [
        ...
        'news' => [
            'class' => 'roboapp\news\Module',
        ]
        ...
    ],
```
## Usage

``` php
    use roboapp\news\api\News;
    
    News::has('home'); // if you want check to exist page
    
    News::get('home'); // if you want get NewsObject
```
## Documentation

[Definitive guide to News module](docs/README.md)

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
