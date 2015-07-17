---
layout: post
title: GSoC Progress - Week 8
tags:
  - Programming
  - GSoC
  - SymPy
permalink: /GSoC-Progress-Week-8
---	

Hello. Short time since my last post. Here's my report since then.

### Progress

I have continued my work on the Polynomial wrappers.

Constructors from `hash_set` and `Basic` have been developed and pushed up. Printing has also been pushed. I'm currently writing tests for both, they'll be ready soon.

When `hash_set_eq()` and `hash_set_compare()` were developed, we realised that there were many functions in `*_eq()` and `*_compare()` form with repeated logic, the idea was to templatize them which [Shivam](https://github.com/shivamvats) did in his PR [#533](https://github.com/sympy/symengine/pull/533).

Solution to worry of slow compilation was chalked which I wish to try in the coming week, using `std::unique_ptr` to a `hash_set`, instead of a straight `hash_set`. Hence not necessary to know the full definition of `hash_set` in the header. I've been reading relevant material, known as `PIMPL` idiom.

### Report

**WIP** <br/>
* [#511](https://github.com/sympy/symengine/pull/511) - Polynomial Wrapper <br/>

### Targets for Week 9

I wish to develop the  `Polynomial` wrappers further in the following order. <br/>

* Constructors and basic methods, `add`, `mul`, etc, working with proper tests. <br/>
* Solve the problem of slow compilation times. <br/>
* As mentioned previously, use standard library alternates to Piranha constructs so that we can have something even when there is no Piranha as dependency. <br/>

After the institute began, the times have been rough. Hoping everything falls in place. <br/>

Oh by the way, [SymPy](http://www.sympy.org/en/index.html) will be present (and represented heavily) at [PyCon India 2015](https://in.pycon.org/2015/). We sent in the content and final proposal for review last week. Have a look at the website for our proposal [here](http://iamit.in/sympy-pycon/).

That's all this week. <br/>
**sayōnara**
