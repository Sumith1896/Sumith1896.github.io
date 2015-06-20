---
layout: post
title: GSoC Progress - Week 3 and 4
tags:
  - Programming
  - GSoC
  - SymPy
permalink: /GSoC-Progress-Week-3-and-4
---	

Hello, this post contains the third report of my GSoC progress. At one point, I had changed the deadline from Sundays to Fridays, but I seem to be running a week late on the post names. That has been corrected now

### Progress

We decided to replace `mpz_class` with `piranha::integer` for coefficients and `std::unordered_map` with `piranha::hash_set` for the container. We got the lower-level working with this data-structure in the last week. <br/>
We decided to depend on `Piranha` for the `Polynomial` else our module won't be upto the speed we expect it to. <br/>
In future, we can write our hashtable and Integer as and when needed. <br/>

### Report

The benchmarks results are: <br/>

`expand2b` has: <br/>

`Average: 108.2ms` <br/>
`Maximum: 114ms  ` <br/>
`Minimum: 107ms  ` <br/>

while the latest `expand2d` has: <br/>

`Average: 23ms` <br/>
`Maximum: 23ms` <br/>
`Minimum: 23ms` <br/>

which is a nice 4-5x speed-up. <br/>
The code for this(experimental) can be found in [470](https://github.com/sympy/symengine/pull/470). <br/>
A more detailed report can be found [here](https://github.com/sympy/sympy/wiki/Benchmark-results-expand2b,-SymEngine). <br/>

I also sent in a minor PR with some clean-ups that I felt neccessary in [472](https://github.com/sympy/symengine/pull/472).

### Targets for Week 5
* Wrap the the lower level into a `Polynomial` class.
* Have the functionality of atleast the `UnivariatePolynomial` class.
* Explore what kind of coefficients can be passed, since we have `piranha::integer` we need to think of having `rational` and `symbolic` coefficients now itself.
* Think of various areas where `Polynomial` class needs to integrate in SymEngine for example `expand()`

That's all this week. <br/>
**Vaarwel**
