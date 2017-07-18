#! /usr/bin/env php
<?php

/**
 * Check whether a number is prime.
 *
 * @param int p
 *   the candidate prime
 *
 * @return bool
 *   TRUE if p is prime, FALSE otherwise.
 */
function isPrime($p) {
  if ($p < 0) {
    $p = 0 - $p;
  }
  if ($p < 2) {
    return FALSE;
  }
  $q = 2;
  while ($q * $q <= $p) {
    if (0 === $p % $q) {
      return FALSE;
    }
    ++$q;
  }
  return TRUE;
}

/**
 * Find successive squares (mod $p) of $a.
 *
 * @param int $p
 *   The modulus for calculations, probably prime.
 * @param int $a
 *   (optional, default 2) The seed to start the sequence of successive squares.
 *
 * @return array
 *   A list of successive squares: [$a, $a^2, ($a^2)^2, ...]. The last element
 *   of the list is the first number that occurs earlier in the list.
 */
function successiveSquares($p, $a = 2) {
  $been_there = [];
  while (!in_array($a, $been_there)) {
    $been_there[] = $a;
    $a = ($a * $a) % $p;
  }
  $been_there[] = $a;
  return $been_there;
}

echo "Successive Squares\n";

for ($p = 3; $p < 1000; $p +=2) {
  if (!isPrime($p)) {
    continue;
  }

  $squares = successiveSquares($p);
  echo "p = $p:  " . implode(' -> ', $squares) . PHP_EOL;
  if (1 == array_pop($squares)) {
    // Subtract 1 for 0-indexing and 1 to get -1 instead of +1.
    $n = count($squares) - 2;
    echo "2^(2^$n) + 1 = 0 (mod $p).\n";
  }
}
