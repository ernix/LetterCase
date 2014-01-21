LetterCase
==========

A tool to convert from and to camelCase, snake\_case, PascalCase and Path/Form.

## USAGE

```php
<?php

use Ernix\LetterCase;

// from PascalCase
$snake_case = LetterCase::snake('LetterCase');  // => 'letter_case'
$camelCase  = LetterCase::camel('LetterCase');  // => 'letterCase'
$PascalCase = LetterCase::pascal('LetterCase'); // => 'LetterCase'
$path_form  = LetterCase::path('LetterCase');   // => 'Letter/Case'

// to PascalCase
LetterCase::pascal($snake_case); // => 'LetterCase'
LetterCase::pascal($camelCase);  // => 'LetterCase'
LetterCase::pascal($PascalCase); // => 'LetterCase'
LetterCase::pascal($path_form);  // => 'LetterCase'
```
