LetterCase
==========

camelCase/snake\_case converter

## USAGE

```php
<?php

$snake_case = \LetterCase\snake('camelCase');   // => 'camel_case'
$camelCase  = \LetterCase\camel('snake_case');  // => 'snakeCase'
$PascalCase = \LetterCase\pascal('snake_case'); // => 'SnakeCase'
$path_form  = \LetterCase\path('PascalCase');   // => 'Pascal/Case'
```
