---
layout: post
title: GSoC Progress - Week 6
tags:
  - Programming
  - GSoC
  - SymPy
permalink: /GSoC-Progress-Week-6
---	

Hello, received a mail few minutes into typing this, passed the midterm review successfully :) <br/>
Just left me wondering how do these guys process so many evaluations so quickly. I do have to confirm with [Ondřej](https://github.com/certik) about this. <br/>
Anyways, the project goes on and here is my this week's summary. <br/>

### Progress

`SymEngine` successfully moved to using `Catch` as a testing framework. 

The travis builds for clang were breaking, this let me to play around with travis and clang builds to fix this issue. The linux clang build used to break because we used to mix-up and link libraries like `GMP` compiled with different standard libraries.  <br/>
Thanks to [Isuru](https://github.com/isuruf) for lending a helping hand and fixing it in his PR.

Next task to make `SYMENGINE_ASSERT` not use standard `assert()`, hence I wrote my custom assert which simulates the internal `assert`.  <br/>
Now we could add the `DNDEBUG` as a release flag when `Piranha` is a dependence, this was also done.

Started work on `Expression` wrapper, PR that starts off from Francesco's work sent in.

Investigated the slow down in benchmarks that I have been reporting in the last couple of posts. Using `git commit`(amazing tool, good to see binary search in action!), the first bad [commit](https://github.com/Sumith1896/csympy/commit/35f384a484315efbb900ec4ec0b0eb97e791c193) was tracked. We realized that the inclusion of `piranha.hpp` header caused the slowdown and was resolved by using `mp_integer.hpp`, just the requirement header.  <br/>
With immense help of [Franceso](https://github.com/bluescarni), the problem was cornered to this: <br/>
* Inclusion of `thread_pool` leads to the slowdown, a global variable that it declares to be specific. <br/>
* In general a multi-threaded application may result in some compiler optimizations going off, hence slowdown. <br/>
* Since this benchmark is memory allocation intensive, another speculation is that compiler allocates memory differently. <br/>

This SO [question](http://stackoverflow.com/questions/31212943/performance-cost-of-threading-constructs-missed-optimisations-and-memory-alloca) asked by [@bluescarni](https://github.com/bluescarni) should lead to very interesting developments. 

We have to investigate this problem and get it sorted. Not only because we depend on `Piranha`, we might also have multi-threading in `SymEngine` later too.

### Report

No benchmarking was done this week. <br/>
Here is my PR reports. <br/>

**WIP** <br/>
* [#500](https://github.com/sympy/symengine/pull/500) - Expression Wrapper <br/>

**Merged** <br/>
* [#493](https://github.com/sympy/symengine/pull/493) - The PR with `Catch` got merged. <br/>
* [#498](https://github.com/sympy/symengine/pull/498) - Made `SYMENGINE_ASSERT` use custom assert instead of `assert()` and `DNDEBUG` as a release flag with `PIRANHA`. <br/>
* [#502](https://github.com/sympy/symengine/pull/502) - Make `poly_mul` used `mpz_addmul` (FMA), nice speedup of `expand2b`.
* [#496](https://github.com/sympy/symengine/pull/496) - En route to fixing `SYMENGINE_ASSERT` led to a minor fix in one of the assert statements. <br/>
* [#491](https://github.com/sympy/symengine/pull/491) - Minor fix in compiler choice documentation.

### Targets for Week 7

* Get the `Expression` class merged. <br/>
* Investigate and fix the slow-downs. <br/>

The rest of tasks can be finalized in later discussion with [Ondřej](https://github.com/certik).

That's all this week. <br/>
**Ciao**
