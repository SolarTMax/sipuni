# Test task for Sipuni 
Here is class TextTransformer whitch can sort chars in every word inside any text

# Example
```php
$tt = new TextTransformer('lemon orange banana apple');
print_r($tt->sortCharsInWords()->get());
```
Will return 'elmno aegnor aaabnn aelpp'

Also here is some unit tests

#### Setup
```bash
composer install
```

#### Running Tests
```shell
composer phpunit
```