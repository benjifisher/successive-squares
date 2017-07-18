# Successive Squares

Compute successive squares to investigate primes that divide Fermat numbers.

## Fermat numbers

Fermat conjectured that all of the following numbers (now known as Fermat
numbers) are prime:

- `2^1 + 1 = 3`
- `2^2 + 1 = 5`
- `2^4 + 1 = 17`
- `2^8 + 1 = 257`
- `2^16 + 1 = 65537`
- ...
- `2^(2^n) + 1`

Euler disproved this conjecture.
In fact, it fails for the first "Fermat number" not explicitly listed above:
`2^32 + 1` is a multiple of `641`.

## The fifth Fermat number is not prime

I have often seen clever proofs of this fact that avoid excessive computation.
I only recently tried a non-clever approach, and was surprised that with a few
minutes and a few square inches of paper I could verify that `641` divides the
fifth Fermat number:

```
2^1 = 2;
2^2 = 4;
2^4 = 4^2 = 16;
2^8 = 16^2 = 256;
2^16 = 256^2 = 65536 = 154 (mod 641);
2^32 = 154^2 = 23716 = 640 (mod 641).
```

This calculation does not require any cleverness.
The only way in which it does not count as "brute force" is that it calculates
`2^32` by squaring (and reducing modulo `641`) five times instead of
repeatedly multiplying by `2`.

## Primes that divide Fermat numbers

Jim Propp pointed out that similar calculations, replacing `641` with various
primes, would answer the following questions:

- Which primes divide some Fermat number?
- What is the smallest prime `p` that divides some Fermat number but is not
  itself a Fermat number?

Euler's observation shows that `641` is a candidate for the answer to the
second question.
I have not researched whether Euler explicitly answered this question himself,
and I would not be surprised if he did.

## What code is in this repository?

This repository contains a PHP script that loops through the odd numbers less
than `1000`, checks for primality, and then computes successive squares,
starting with `2`, until it finds a repetition.
It also contains a text file with the output of the script.
As I expected, it confirms that `641` is the smallest non-Fermat prime that
divides some Fermat number.
(Search for lines that begin with the character "2".)

I am happy to report that the script also confirms that I did the calculations
correctly as far as I was willing to do them manually.
