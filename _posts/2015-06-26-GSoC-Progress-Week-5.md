---
layout: post
title: GSoC Progress - Week 5
tags:
  - Programming
  - GSoC
  - SymPy
permalink: /GSoC-Progress-Week-5
---	

Hello, this post contains the fourth report of my GSoC progress. We hit `Piranha`'s speed,
the highlight of this week. 

### Progress

We were able to reach `Piranha`'s speed. At an average `14-ish ms` to the benchmark, we are happy enough (still can be improved) to start wrapping this low-level implementation to a `Polynomial` class. Last week I had reported speed `23ms` and this week we are better. <br/>

We had missed out a compiler flag, `DNDEBUG` to indicate `Release` mode of `Piranha` leading to slow-down, [#482](https://github.com/sympy/symengine/issues/482). <br/>
Adding this compiler flag means we should not be using `assert` statement, which `SymEngine` does in `SYMENGINE_ASSERT` and test files too. These had to be sorted out if `Piranha` were to be a hard dependency of `SymEngine`'s polynomial module. <br/>

Hence, the issue of moving the tests suite from `assert`s to a well-developed test framework came up again, [#282](https://github.com/sympy/symengine/issues/282). We explored a couple, but `Catch` still seemed to be the best option. <br/>
`Catch` was implemented, which is a benefit to `SymEngine` in the long run too. <br/>
As for the `SYMENGINE_ASSERT`, we decided to change our macro to raise an exception or just abort the program. <br/>
[Catch](https://github.com/philsquared/Catch) is a very good tool. We thank [Phil Nash](https://github.com/philsquared) and all the contributors for making it.

Next up, wrapping into `Polynomial`. <br/>

* We need some functionality to convert a `SymEngine` expression(`Basic`) into one of `hashset` representations directly. Now I convert `basic` to `poly` and then to `hashset` as just getting the speed right was the issue. <br/>

* Domains of coefficients need to be thought of. `SymPy` and `Sage` will be need to looked into and their APIs need to be studied. We need `ZZ`, `QQ` and `EX`, the work for `EX` has been done by [Francesco Biscani](https://github.com/bluescarni), this will be patched for the latest master and commited in his name.
There could also be an automatic mode, which figures out the fastest representation for the given expression, at the price of a little slower conversion, as it needs to traverse the expression to figure out what representation fits. <br/>

* `tuple` to `packed` conversion when exponents don't fit. Also `encode` supports signed ints which is a boon to us, as we don't have to worry about negative exponents. For `rational` exponents we use tuple. <br/>

I still haven't figured out the reason for slow down of `expand2` and `expand2b` in my `packint` branch. I have been suggested to use `git bisect`. Will do next week.

### Report

`expand2d` results:

Result of 10 execution:  <br/>
`14ms` <br/>
`14ms`<br/>
`14ms` <br/>
`15ms` <br/>
`14ms` <br/>
`15ms` <br/>
`14ms` <br/>
`14ms` <br/>
`15ms` <br/>
`14ms` <br/>

Maximum: 15ms <br/>
Minimum: 14ms <br/>
Average: 14.3ms <br/>

Here, the `evaluate_sparsity()` gave the following result for the `hash_set` <br/>

`0,11488` <br/>
`1,3605` <br/>
`2,1206` <br/>
`3,85` <br/>

`Piranha` has the following results <br/>

`Average: 13.421ms` <br/>
`Maximum: 13.875ms` <br/>
`Minimum: 12.964ms`  <br/>

A more detailed report of benchmarks and comparisons can be found [here](https://github.com/sympy/sympy/wiki/Benchmark-results-expand2b,-SymEngine)

A minor PR where MPFR was added as a Piranha dependency, [472](https://github.com/sympy/symengine/pull/472) was merged. <br/>

Another PR in which the tests where moved to `Catch` is good to play with and merge, minor build nits remaining, [484](https://github.com/sympy/symengine/pull/484). <br/>

### Targets for Week 5
* Figure out the reason for [slow down](https://github.com/sympy/sympy/wiki/Benchmark-results-expand2b,-SymEngine#why-is-there-a-slowdown-in-packint-branch-for-expand-and-expand2b) in benchmarks, fix that. <br/>
* Change the `SYMENGINE_ASSERT` [macro](https://github.com/sympy/symengine/blob/bbe3c9baf653d18d37e3bfcd424e0781786098c1/symengine/symengine_assert.h#L7) to raise an [exception](https://github.com/sympy/symengine/blob/bbe3c9baf653d18d37e3bfcd424e0781786098c1/symengine/symengine_assert.h#L13). <br/>
* Add the `DNDEBUG` flag for with `Piranha` builds, as now `SymEngine` doesn't use `assert`, close issue [#482](https://github.com/sympy/symengine/issues/482).
* Port [`@bluescarni`](https://github.com/bluescarni)'s [work](https://github.com/sympy/symengine/compare/master...bluescarni:expression) of `EX` to SymEngine. <br/>
* Wrap the lower-level into `Polynomial` for signed integer exponents in `ZZ` domain with functionality atleast that of `UnivariatePolynomial`. <br/>

That's all this week. <br/>
**Sbohem**
