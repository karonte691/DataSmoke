# DataSmoke

DataSmoke is a PHP lightweight library for generating random string/bool/number/date value. The goal is to provide this
functions without use any external libraries, in order to keep this lib as pure php implementation


## Usage

## number
```php
 DataSmoke::inizialize();

 $number = DataSmoke::number()->int();

 var_dump($number); //int(84)
```

For more complex integer use:

```php
 DataSmoke::inizialize();

 $number = DataSmoke::number()->complexInt();

 var_dump($number); //int(443647175)
```

If you want get float number instead of Integer, please use:

```php
 DataSmoke::inizialize();

 $number = DataSmoke::number()->float();

 var_dump($number); //float(0.99145775520776)
```


## String

For generating random string:
```php
 DataSmoke::inizialize();

 $str = DataSmoke::string()->simple();

 var_dump($str); //string(32) "9b45ceb9533c4f6f4b68d18e7a8d300d"
```

If you prefer to use an hashing value(for more randomness), you could do it using:
```php
 DataSmoke::inizialize();

 $str = DataSmoke::string()->hash(DataSmoke::SHA256_HASH_METHOD);

 var_dump($str); //string(64) "c7d8c090610922dcc2ef865dbd139539428f81c3a20136fc9788f7d3049e8943"
```

Currently, DataSmoke supports only Md5(default), sha1 and sha256 as input for the hash() function

If you want to implement an uuid v4 random string instead, you could do it by simple:
```php
 DataSmoke::inizialize();

 $str = DataSmoke::string()->uuidv4();

 var_dump($str); //string(36) "7cd667e6-be56-49f5-ba18-9403c0458a18"
```

Or perhaps just a simple char will do it's job:
```php
 DataSmoke::inizialize();

 $str = DataSmoke::string()->char();

 var_dump($str); //string(1) "a"
```

## Bool

To retrieve a random boolean value:

```php
 DataSmoke::inizialize();

 $boolean =  DataSmoke::bool()->value();

 var_dump($boolean); //bool(false)
```

## Date

Yep, DataSmoke could generate random date too:

```php
 DataSmoke::inizialize();

 $dateTime =  DataSmoke::date()->value();

 var_dump($dateTime); //...object(DateTime)#35 (3) {
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)