#PHP Readonly Array

##Instalation

You have two options. Download <code>ReadonlyArray</code> class and include it in your project or use composer.

<code>composer require wilgucki/php-readonly-array</code>

If you use composer, don't forget to include autoloader in your project.

```php
require 'vendor/autoload.php';
```

##Usage

Create new ReadonlyArray object and pass array to its constructor.

```php
$readonlyArray = new ReadonlyArray([
    'a' => 1,
    'b' => 2
]);
```

Use object as array

```php
echo $readonlyArray['a']; // 1
var_dump(isset($readonlyArray['b'])); // true
var_dump(isset($readonlyArray['c'])); // false
```

If you try to get value from non-existent offset, OutOfRangeException will be thrown.

You cannot set value to an existing key nor you cannot unset defined value. If you try to do so, an LogicException will be thrown.

```php
$readonlyArray['a'] = 3; // LogicException
unset($readonlyArray['c']); // LogicException
```

ReadonlyArray is marked as final class, so you can't extend it.

You can iterate through ReadonlyArray using foreach loop.

```php
$readonlyArray = new ReadonlyArray([
    'a' => 1,
    'b' => 2
]);

foreach ($readonlyArray as $k => $v) {
    echo $k.' '.$v;
}
```

If you need to count elements of ReadonlyArray, use <code>count</count> function.

```php
$readonlyArray = new ReadonlyArray([
    'a' => 1,
    'b' => 2
]);

count($readonlyArray);
```