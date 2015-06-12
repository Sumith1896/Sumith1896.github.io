---
layout: post
title: GSoC Progress - Week 2
tags:
  - Programming
  - GSoC
  - SymPy
permalink: /GSoC-Progress-Week-2
---	

Hello, this post contains the second report of my GSoC progress. At one point, I had changed the deadline from Sundays to Fridays, but I seem to be running a week late on the post names. Will be corrected next week.

### Progress

We decided that instead of coding up the `Polynomial` upfront, we try to speed up the expand2b benchmark i.e. try to nail speed at a lower level, then think of the design decisions and wrap it up into `Polynomial` class. <br/>
The plan was this: <br/>
* Add support for `Piranha` in `SymEngine` CMake <br/>
* Implement packing of exponents and a check function to ensure it fits, use this to fasten expand2b <br/>
* Use Piranha's integer and benchmark expand2b again <br/>

The faster hashtable was kept for later.

### Report

[PR 464](https://github.com/sympy/symengine/pull/464) was merged. <br/>
Implements support for `Piranha` in CMake along with it's dependencies `Boost` and `PTHREAD`. <br/>
The above two dependencies come as separate CMake option as well. We feel that the `Boost` support can be improved, that can be done at a later stage.

[PR 470](https://github.com/sympy/symengine/pull/470) Speeding up the benchmark. <br/>
* The pack and check function were implemented <br/>
* Used `std::valarray` instead `std::vector`(inspired by [issue 111](https://github.com/sympy/symengine/issues/111)) but the benchmark slowed down, hence change was not adopted <br/>
* Implemented functions `poly2packed()` and `packed2poly()`, for converting between the two representations <br/>
* Implemented function `poly_mul2()` for multiplying the packed polynomials <br/>
* Re-wrote `expand2b` to use packed, now `expand2c` <br/>

Very nice speedup was obtained from using the packed structure, a more detailed report can be found [here](https://github.com/sympy/sympy/wiki/Benchmark-results-expand2b,-SymEngine). <br/>
But we are still far from `Piranha` and we have lots to do :).

Most of the week's time went to learning to link libraries and writing cmake files for my own projects so that I could figure what was happening in [PR 464](https://github.com/sympy/symengine/pull/464). Now I feel it was very easy a task and shouldn't have consumed the time it did.

### Targets for Week 3
My aim is to get all the code and optimization, possible at this level, done by next week, so that we can start wrapping in the coming weeks. <br/>
* Use `piranha::integer` for coefficients, benchmark <br/>
* Implement switching between packed structure and tuple depending on whether exponents fit or not <br/>

If time permits, I want to implement a system to use `int` for small cofficients and switch to `mpz_class` when large.<br/>
We have lots to do to hit the speed that we expect.<br/>

That's all folks.<br/>
**Au Revoir**
