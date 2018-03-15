# phulp-scss-compiler

The scss-compiler addon for [PHULP](https://github.com/reisraff/phulp). It's a wrapper for [leafo/scssphp](https://github.com/leafo/scssphp).

## Install

```bash
$ composer require reisraff/phulp-scss-compiler
```

## Usage

```php
<?php

use Phulp\ScssCompiler\ScssCompiler;

$phulp->task('scss', function ($phulp) {
    $phulp->src(['src/'], '/scss$/')
        // compile
        ->pipe(new ScssCompiler)
        // write your compiled files
        ->pipe($phulp->dest('dist/'));
});

```

### Options

***import_paths*** : The paths where can be located files to be imported. Should be an array

```php
<?php

use Phulp\ScssCompiler\ScssCompiler;

$compiler = new ScssCompiler([
    // default: null
    'import_paths' => ['src/styles/']
]);

```
