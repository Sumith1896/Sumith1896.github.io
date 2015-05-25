---
layout: post
title: Gearing up for GSoC
tags:
  - Programming
  - GSoC
  - SymPy
permalink: /Gearing-up-for-GSoC
---	

Greetings! The community bonding is officially closed now. It's time for the coding period. I had promised myself a post every sunday from the 24th of May 2015 but seems like the first post is a bit late. 

### Community bonding
I had discussions with [Ondřej](https://github.com/certik) and [Shivam](https://github.com/shivamvats) about the big tasks in hand and how to go about handling the work. In the first discussion, we also assigned ourselves the first task that needs to be completed.<br/>
I have to:<br/>
* Clean up the necessary in the [PR](https://github.com/sympy/symengine/pull/406) Shivam had sent during his proposal period.<br/>
* Implement `sub_poly()` and `mul_poly()` with Kronecker substitution in a clean fashion.<br/>
Shivam agreed to finish `ring_series` in [SymPy](https://github.com/sympy/sympy) which he has already started working on.<br/>
Also together we decided to work on a faster hashtable implementation.<br/>
I also discussed with [Sushant](https://github.com/sushant-hiray) about the structure of the current [SymEngine](https://github.com/sympy/symengine) and cleared my doubts there.<br/>

As a part of community bonding, I looked to some tools that I'll be using. Certain C++11 constructs, visitor pattern, etc. Even though I am not thorough with it, I think learning it as I progress with the work is the best thing to do.

Regarding the work I undertook in this period, is minimal, but here they are:<br/>
**Issues**<br/>
[#443](https://github.com/sympy/symengine/issues/443): Documentation of SymEngine.<br/>
**Pull requests**<br/>
As I read through the code I felt some clean ups necesarry which were done in <br/>
[#444](https://github.com/sympy/symengine/pull/444) and [#438](https://github.com/sympy/symengine/pull/438): Pending<br/>
[#451](https://github.com/sympy/symengine/pull/451), [#442](https://github.com/sympy/symengine/pull/442), [#441](https://github.com/sympy/symengine/pull/441) and [#440](https://github.com/sympy/symengine/pull/440): Merged<br/>

In my proposal, I had promised [Piranha](https://github.com/bluescarni/piranha) audit but it didn't happen in such a short period due to complex code. Best way to go forward was to start work for `Polynomial`.<br/>
The work regarding `Polynomial` class has already begun [here](https://github.com/sympy/symengine/pull/454). I thank the whole [SymEngine](https://github.com/sympy/symengine) community for actively participating there and giving their inputs.<br/>


### Targets for Week 1
Complete the `Polynomial` class, need to implement:<br/>
* basic functions `__hash__`, `__eq__`, `compare`, `from_dict` like other SymEngine classes.<br/>
* Implement printer and tests for that.<br/>
* Implement `add_poly()`, `neg_poly()`, `sub_poly()`, `mul_poly()`, `eval()` and respective tests.<br/>
If possible, time permits<br/>
* Start working on the hashtable along with [Shivam](https://github.com/shivamvats).<br/>

I am really excited as the coding period has officially started. The whole [SymEngine](https://github.com/sympy/symengine) community has been active on [Gitter](https://gitter.im/sympy/symengine) as well as [PR](https://github.com/sympy/symengine/pull/454) discussion, looking forward to awesome learning experience with them.

That's all for now. Catch you next week.<br/>
**Freilos**(German)