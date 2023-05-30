# Random

An PHP tool for generate random values easily.

##  Requirements

PHP >= 8.2

## Installation
via Composer:
```
composer require alirezasalehizadeh/random
```


## Usage
#### Integer
```php
use Alirezasalehizadeh\Random;


// Generate an random int
(new Random)->randomInt(): int

// Pick an random int between min and max
(new Random)->pickInt($min, $max): int
```
#### String
```php
use Alirezasalehizadeh\Random;


// Generate an random string with specific length
(new Random)->randomString(int $length): string

// Generate an random string from given string
(new Random)->pickString(string $bytes): string
```
#### Array
```php
use Alirezasalehizadeh\Random;


// Generate an random array from given array
(new Random)->randomArray(array $array): array

// Pick random elements from given array
(new Random)->choice(array $array, int $num): array
```
### Engines
You can use engines in `/Engines` for generate random string values:
#### Mt19937(Mersenne Twister)
```php
use Alirezasalehizadeh\Random;
use Alirezasalehizadeh\Random\Engines\MersenneTwisterEngine;


(new Random(new MersenneTwisterEngine))->getEngine()->generate(): string

```
#### PcgOneseq128XslRr64
```php
use Alirezasalehizadeh\Random;
use Alirezasalehizadeh\Random\Engines\PCGEngine;


(new Random(new PCGEngine))->getEngine()->generate(): string

```
#### Xoshiro256StarStar
```php
use Alirezasalehizadeh\Random;
use Alirezasalehizadeh\Random\Engines\XoshiroEngine;


(new Random(new XoshiroEngine))->getEngine()->generate(): string

```
### Facades
```php
use Alirezasalehizadeh\Random\Facades\Random;

Random::randomInt(): int
Random::pickInt($min, $max): int

Random::randomString(int $length): string
Random::pickString(string $bytes): string

Random::randomArray(array $array): array
Random::choice(array $array, int $num): array

```


## Contributing
Send pull request or open issue for contributing.


## License

[MIT](LICENSE).

