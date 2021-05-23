<?php

if (!function_exists("array_reduce_assoc")) {
  /**
   * reduce for associative arrays
   *
   * @param array $array
   * @param callable $callback ($carry, $key, $value) => $newcarry
   * @param mixed $initial
   */
  function array_reduce_assoc(array $array, callable $callback, $initial = null)
  {
    $carry = $initial;
    foreach ($array as $key => $value) {
      $carry = $callback($carry, $key, $value);
    }
    return $carry;
  }
}

if (!function_exists("dd")) {
  function dd($var)
  {
    echo "<pre>";
    var_dump(htmlspecialchars($var));
    echo "</pre>";
    die();
  }
}

/**
 * escape a string
 */
if (!function_exists("e")) {
  function e(string $value)
  {
    return htmlspecialchars($value ?? "", ENT_QUOTES, "UTF-8", true);
  }
}
