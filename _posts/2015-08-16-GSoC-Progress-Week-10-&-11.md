---
layout: post
title: GSoC Progress - Week 10 and 11
tags:
  - Programming
  - GSoC
  - SymPy
permalink: /GSoC-Progress-Week-10-&-11
---	

Hello all. Here are the most recent developments in the Polynomial wrappers.

### Report

* The Polynomial wrappers was using `piranha::hash_set` as the `Polynomial` wrappers, hence when there was no `Piranha` as a dependence, the `Polynomial` wouldn't compile. The fix to this was to use `std::unordered_set` with `-DWITH_PIRANHA=no` so that there would be atleast a slow version available.

* Another issue was Travis testing of `Polynomial`. Since we depend on `Piranha`, we had to setup Travis testing with `Piranha` included and `Polynomial` tests run. This was done in the merged PR [585](https://github.com/sympy/symengine/pull/585).

* Before we get the `Polynomial` merged we have to add `mul_poly`, improve printing, and test exhaustively. The `mul_poly` is ready [here](https://github.com/shivamvats/symengine/pull/4), will be merged once more tests are prepared.

For `mul_poly`, previously we never checked the variables corresponding to the `hash_set`s, which implies you could only multiply a `n` variable polynomial with another `n` variable polynomial with the variable symbols same in both. When the variables of two hash_sets are different, a work around would be needed. This would result in slow down if done directly.

As suggested by [Ondřej](https://github.com/certik), `mul_poly` now calls two functions `_normalize_mul` and `_mul_hashest`. Here `_noramlize_mul` sees to it that the `hash_set`s satisfy the afore mentioned criteria and then `_mul_hashset` operates  <br/>
For example, say `mul_poly` is called,
then `_normalize_mul` converts `{1, 2, 3}` of `x, y, z` and `{4, 5, 6}` of `p, q, r` to `{1, 2, 3, 0, 0, 0}` and `{0, 0, 0, 4, 5, 6}`
and `_mul_hashset` multiplies the two `hash_set`. The speed of benchmarks determined by `_mul_hashset`.

* The printing needs improvement. As of now the polynomial `2*x + 2*y` gets printed as `2*y**1*x**0 + 2*y**0*x**1`.

* Not all that was planned could be completed this summers, mostly because of my hectic schedule after the vacations ended and institure began. I am planning to work after the program ends too, when the workload eases. As the final deadline week of GSoC is coming up, I need to ensure at least the PRs on hold gets merged.I am planning to continue after the period ends so as 

That's all I have <br/>
**See ya**
