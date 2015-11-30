#PHP Readonly Array

##Usage

Create new ReadonlyArray object and pass array to its constructor.

```
$readonlyArray = new ReadonlyArray([
    'a' => 1,
    'b' => 2
]);
```

Use object as array

```
echo $readonlyArray['a']; // 1
var_dump(isset($readonlyArray['b'])); // true
var_dump(isset($readonlyArray['c'])); // false
```

If you try to get value from non-existent offet, OutOfRangeException will be thrown.

You cannot set value to an existing key nor you cannot unset defined value. If you try to do so, an LogicException will be thrown.

```
$readonlyArray['a'] = 3; // LogicException
unset($readonlyArray['c']); // LogicException
```

ReadonlyArray is marked as final class, so you can't extend it.