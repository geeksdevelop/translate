# Laravel Translate Data
###Compatible with laravel ^5.1
Package for the translation of fields in the database according to the language of configuration of the laravel system.

## Installation
```bash
  composer require geeksdevelop/translate "dev-master"
```
### Service Provider

Add the package to your application service providers in `config/app.php` file.

```php
'providers' => [
    /*
     * Package Service Providers...
     */
    Geeksdevelop\Translate\TranslateProvider::class,
],
```

### Publish
Publish the migration to your application. Run these commands inside your terminal.
```bash
  php artisan vendor:publish --provider="Geeksdevelop\Translate\TranslateProvider"
```

### Migrate the tables
Run migrations.
```bash
  php artisan migrate
```

### Include trait to models
Include the `Translate` feature within your models where you need to translate fields.

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Geeksdevelop\Translate\Traits\Translate;

class Post extends Model
{
    use Translate;

],
```

## User Guide

## Create translations
Create the translation by placing the following data
`locale` => language to translate,
`type` => Input name to translate,
`value` => string incresada ene the input,
```php
$post->setTranslate($locale, $type, $value);
```

### Exemple
```php
$post = Post::create([...]);
#English language
$post->setTranslate('en', 'title', 'Title of the post');
#French language
$post->setTranslate('fr', 'title', 'Après le titre');

#Table translates
+----+----------------+--------------------+-----------------+------------------+
| id | locale | type  |      value         | translable_type | translable_value |
+----+----------------+--------------------+-----------------+------------------+
| 1  | en     | title | Title of the post  | 1               | App\Post         |
+----+----------------+--------------------+-----------------+------------------+
| 2  | fr     | title | Après le titre     | 1               | App\Post         |
+----+----------------+--------------------+-----------------+------------------+
```

## Get the translation
To get a translation we just have to make use of the method `translate()`, which by entering the type will give us the translation depending on the language in which the laravel system is configurated.
```php
$post->translate('title');
#Title of the post
```
If you want to get a specific translation in a language other than the one that is configured laravel you can use the `translate ()` method, in the following way:
```php
$post->translate('title', 'fr');
#Après le titre
```
Using `translate()`, we can get all the translations that have been registered on the model in different languages.
```php
$post->translate();
/*
translate => [
  0 => [
    'id' => 1,
    'locale' => 'en', 
    'value' => 'Title of the post', 
    'translable_type' => 1, 
    'translable_value' => 'App\Post'
  ],
  1 => [
    'id' => 2,
    'locale' => 'fr', 
    'value' => 'Après le titre', 
    'translable_type' => 1, 
    'translable_value' => 'App\Post'
  ]
];
*/
```

## Update translations
To update, the method to be used is `updateTranslate(locale, type, value)`
```php
$post->updateTranslate($locale, $type, $value);
```

## Delete translation
To delete just use the method `deleteTranslate(locale, type)`
```php
$post->deleteTranslate($locale, $type);
```
