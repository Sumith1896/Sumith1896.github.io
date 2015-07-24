---
layout: post
title: GSoC Progress - Week 9
tags:
  - Programming
  - GSoC
  - SymPy
permalink: /GSoC-Progress-Week-9
---	

Hello all. Last week has been rough, here's what I could do.

### Report

The printing now works, hence I could test them. Due to that we could even test both the constructors, one from `hash_set` and other from `Basic`.

The Polynomial wrappers PR, we need to get in quick, our highest priority.

We need to make the methods more robust, we plan to get it in this weekend. <br/>
Once this is in, [Shivam](https://github.com/shivamvats) can start writing function expansions.

I have also couple of other tasks:

* Use `std::unordered_set` so that we can have something even when there is no Piranha as dependency. <br/>
* Replace `mpz_class` with `piranha::integer` throughout SymEngine and checkout benchmarks.

I intend to get Polynomial in this weekend because I get free on weekends :) <br/>
As there are only 3-4 weeks remaining, I need to buck up.

That's all I have <br/>
**Bidāẏa**
