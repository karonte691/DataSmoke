# DataSmoke

DataSmoke is a PHP library that could generate random string/bool/number/date value. I started to develop this library because the Faker project is discontinued BUT  I do not mean that this library could replace faker(it is just too complex for now), but it's a little start :)


## Usage

## number
```php
 DataSmoke::inizialize();

 $number = DataSmoke::Number()->int();

 var_dump($number); //int(84)
```

For more complex integer use:

```php
 DataSmoke::inizialize();

 $number = DataSmoke::Number()->complexInt();

 var_dump($number); //int(443647175)
```

If you want get float number instead of Integer, please use:

```php
 DataSmoke::inizialize();

 $number = DataSmoke::Number()->float();

 var_dump($number); //float(0.99145775520776)
```


## String

For generating random string:
```php
 DataSmoke::inizialize();

 $str = DataSmoke::String()->simple();

 var_dump($str); //string(32) "9b45ceb9533c4f6f4b68d18e7a8d300d"
```

If you prefer to use an hashing value(for more randomness), you could do it using:
```php
 DataSmoke::inizialize();

 $str = DataSmoke::String()->hash(DataSmoke::SHA256_HASH_METHOD);

 var_dump($str); //string(64) "c7d8c090610922dcc2ef865dbd139539428f81c3a20136fc9788f7d3049e8943"
```

Currently, DataSmoke supports only Md5(default), sha1 and sha256 as input for the hash() function

## Bool

To retrieve a random boolean value:

```php
 DataSmoke::inizialize();

 $boolean =  DataSmoke::Bool()->value();

 var_dump($boolean); //bool(false)
```

## Date

Yep, DataSmoke could generate random date too:

```php
 DataSmoke::inizialize();

 $dateTime =  DataSmoke::Date()->value();

 var_dump($dateTime); //...object(DateTime)#35 (3) {
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)