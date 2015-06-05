---
layout: post
title: GSoC Progress - Week 1
tags:
  - Programming
  - GSoC
  - SymPy
permalink: /GSoC-Progress-Week-1
---	

Hi again, this post contains the first report of my GSoC progress, even though it's week 2. 

### Progress

I have completed the `UnivariatePolynomial` implementation in [PR 454](https://github.com/sympy/symengine/pull/454), the PR is reviewed and merged. This `SymEngine` class can handle univariate polynomials and can handle all the basic polynomial manipulation.

The current functionality of `UnivariatePolynomial` are:<br/>
* two constructors of `UnivariatePolynomial` class, one using a `dict` of degree to coefficient and other is using a dense vector of coefficients. Note that this implementation is sparse. <br/>
* printing, same output pattern as that of SymPy<br/>
* `from_dict` which returns the appropriate `Basic` type on passing the `dict`<br/>
* `dict_add_term` to add a new term to the `dict`<br/>
* `max_coef()`, `diff()`, `eval()` as the name suggests<br/>
* some bool check funtions to check specific cases like `is_zero()`, `is_one()`, etc.<br/>
* also the `add`, `sub`, `neg` and `mul` functions. <br/>

What I learnt here was having a testing environment setup first speeds up the process of implementation and things go in the right direction.<br/>

### Report

The `UnivariatePolynomial` uses `std::map`, I plan to switch to `std::unordered_map` or other specialized data structures before benchmarking the class and comparing speeds so that we get a decent speed.<br/>
The, to be implemented, multivariate class will be called `Polynomial`. Note that two classes are high level, because they can take part in SymPy expressions.

The plan is to implement lower level classes with various data structures, as well as using Piranha. These lower level classes do not use RCP at all, thus they could be faster for some applications. The user could then call specialized classes if needed for a given application (if we implement any).

### Targets for Week 2 and Week 3

First aim is to use the already implemented polynomials in [`rings`](https://github.com/sympy/symengine/blob/master/src/rings.cpp) in SymEngine, look at the [expand2b](https://github.com/sympy/symengine/blob/master/benchmarks/expand2b.cpp) benchmark and try to speed it up by: <br/>
* Making use of Piranha int <br/>
* Using Kronecker packing for exponents 

If we get satisfactory speed, we wrap it in `Polynomial` class. This can further be optimized using our very own class Integer, where in it we switch between int and mpzclass automatically (we should use it everywhere in SymEngine instead of mpzclass) and hashmap in future.

**Tasks** <br/>
* have an option of `Piranha` in cmake <br/>
* code for packing exponents into machine int64 <br/>
* try to use Piranha's integer to see how it performs <br/>
If time permits <br/>
* Implement faster hashmap this weekend with [Shivam](https://github.com/shivamvats)

That's all for now. Catch you next week.<br/>
**Adiós**