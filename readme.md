[![Build Status](https://travis-ci.org/dbrmr/valmod.svg)](https://travis-ci.org/dbrmr/valmod)

### Run: composer install
### Run: ./vendor/bin/phpunit


Should be able to use the package like this
```php
$builder = new Direct\Valmod\ModelBuilder($json);
$createStatement = $builder->getModelDefinition();
```
