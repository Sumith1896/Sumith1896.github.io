---
layout: post
title: GSoC - Wrapping Up
tags:
  - Programming
  - GSoC
  - SymPy
permalink: /GSoC-Wrapping-Up
---	

From not knowing anything considerable in programming and open source to reaching this level, has been a wonderful ride. Google Summer of Code has been full of ups and downs but none the less exhilarating. <br/>

Didn't even know at the time of my [first patch](https://github.com/sympy/symengine/commit/f5243c034953efa228c708e97668a932dc216e37) that I would be so closely associated to SymEngine and the team members just a few months down the line.

After a couple of bug fixes, my first major contribution came in as the [`UnivariatePolynomial`](https://github.com/sympy/symengine/blob/master/symengine/polynomial.cpp) class. The biggest challenge here was implementing multiplication using Kronecker's trick. This was my first experience of implementing an algorithm from a [paper](http://www.cs.berkeley.edu/~fateman/papers/polysbyGMP.pdf). The `UnivariatePolynomial` class shaped up really well, there are minor improvements that can be made and some optimizations that could be done. But standalone, it is a fully functional class.

Once this was done, my next aim was to optimize multiplication to reach `Piranha`'s speed. This was a very enriching period and the discussions with the team members and [Francesco](https://github.com/bluescarni) was a great learning experience. En route, I also got a chance to explore `Piranha` under the hood and trouble Francesco for reasoning why certain things were the way they. End of this, we were able to hit `Piranha`'s speed. I remember I was the happiest I had been in days.

Once we hit the lower level speed, we decided to hard-depend on `Piranha` for `Polynomial`.	This meant adding `Piranha` as SymEngine dependence. Here I had to learnt how to write and wrote `CMake` files as well as setting up Piranha testing in `Travis` meant writing `shell` and `CI` scripts. We faced a problem here, resolution to which meant implementing `Catch` as a testing framework for `SymEngine`. `Catch` is an awesome library and community is very pleasant. Implementing this was a fun work too.
Also the high level value class `Expression` was implemented in `SymEngine`, mostly taken from Francesco's work.

I then started writing the `Polynomial` class, most of the work is done here([597](https://github.com/sympy/symengine/pull/597)). But the design is not very well thought of. I say this because once ready this can only support integer(ZZ) domain. But we will also need rational(QQ) and expression(EX). The code will be of much use but we have been discussing a much cleaner implementation with `Ring` class. Most of the progress and the new design decisions are being documented [here](https://github.com/sympy/symengine/wiki/En-route-to-Polynomial).

Second half has been really rough, with the university running. Ondrej has been really patient with me, I thank him for that. The bond that I made with him through mails, technical and non technical, has really grown strong. He has allowed me to continue the work the `Polynomial` and implement more details and algorithms in future. I am looking forward to that as long term association is an amazing thing and I am proud to be responsible for the **`Polynomial module in SymEngine`**.

I am indebted to my mentor [Ondrej Certik](https://github.com/certik) and all the [SymEngine](https://gitter.im/sympy/symengine) and [SymPy](https://gitter.im/sympy/sympy) developers who were ever ready to help and answer my silliest of questions. It’s an amazing community and they are really very helpful and always appreciated even the smallest of my contributions. The best part of SymEngine is you know contributors one to one and it is like a huge family of learners. I am looking forward to meeting the team (atleast SymPy India in near future).

Google Summer of Code has been one exhilarating journey. I don't know if I was a good programmer then or a good programmer now but I can say that I am a better programmer now.

**This is just the beginning of the ride, GSoC a stepping stone.**

There will be blog posts coming here, so stay tuned. Till then, <br/>
**Bye**

