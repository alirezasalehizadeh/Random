# Random

An PHP tool for generate random values easily.

##  Requirements

PHP >= 8.3

## Installation
via Composer:
```
composer require alirezasalehizadeh/random
```


## Usage
#### Integer
###### Generate an random int
```php
use Alirezasalehizadeh\Random;

Random::int($min = null, $max = null)
```

#### Float
###### Generate an random float
```php
use Random\IntervalBoundary;
use Alirezasalehizadeh\Random;

Random::float($min = null, $max = null, $boundary = IntervalBoundary::ClosedOpen)
```

#### Byte
###### Generate an random bytes with specific length
```php
use Alirezasalehizadeh\Random;

Random::byte($length)
```

#### String
###### Generate an random string from given string
```php
use Alirezasalehizadeh\Random;

Random::string($bytes, $length = null)
```
#### Array
###### Generate an random array from given array
```php
use Alirezasalehizadeh\Random;

Random::array($array)
```
###### Pick random elements from given array
```php
use Alirezasalehizadeh\Random;

Random::pick($array, $num = 1)
```

### [Engines](https://www.php.net/manual/en/class.random-engine.php)
#### [Mt19937(Mersenne Twister)](https://www.php.net/manual/en/class.random-engine-mt19937.php)
```php
use Random\Engine\Mt19937;
use Alirezasalehizadeh\Random;

(new Random(new Mt19937))->generate()
```
#### [PcgOneseq128XslRr64](https://www.php.net/manual/en/class.random-engine-pcgoneseq128xslrr64.php)
```php
use Alirezasalehizadeh\Random;
use Random\Engine\PcgOneseq128XslRr64;

(new Random(new PcgOneseq128XslRr64))->generate()
```
#### [Xoshiro256StarStar](https://www.php.net/manual/en/class.random-engine-xoshiro256starstar.php)
```php
use Alirezasalehizadeh\Random;
use Random\Engine\Xoshiro256StarStar;

(new Random(new Xoshiro256StarStar))->generate()
```

## Contributing
Send pull request or open issue for contributing.


## License

[MIT](LICENSE).

