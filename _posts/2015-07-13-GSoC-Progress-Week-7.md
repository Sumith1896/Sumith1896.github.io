---
layout: post
title: GSoC Progress - Week 7
tags:
  - Programming
  - GSoC
  - SymPy
permalink: /GSoC-Progress-Week-7
---	

Hello. Sorry for the really late post. As I was moving from home to Mumbai back and also part of the grading team of International Physics Olympiad(IPhO), I could not contribute as much as I had thought I could. Here is what I have for this week.

### Progress

The `Expression` class was built upon the initial works of Francesco. I made a SymEngine patch with his as an initial commit. We now have a top-level value class.

The slowdowns finally got tackled. It was Piranha that needed amendment. The slowdown, as discussed previously, was due to the class `thread_pool`. This was resolved was templatizing `thread_pool` i.e. replace `class thread_pool: private detail::thread_pool_base<>` with `template <typename = void> class thread_pool_: private detail::thread_pool_base<>`. This basically saw to it that inclusion of individual headers. Including single `piranha.hpp` still had this problem. The problem was `piranha.hpp` includes `settings.hpp`, which in turn defines a non-template function called `set_n_threads()` which internally invokes the thread pool. This was resolved by a similar fix, the `setting` class to `<typename = void> class settings_`.

Many things were reported until now, hence [Ondřej](https://github.com/certik) suggested a documentation of all the decisions taken. The wiki page, [En route to Polynomial](https://github.com/sympy/symengine/wiki/En-route-to-Polynomial) was hence made.

### Report

**WIP** <br/>
* [#511](https://github.com/sympy/symengine/pull/511) - Polynomial Wrapper <br/>

**Merged** <br/>
* [#512](https://github.com/sympy/symengine/pull/512) - Add Francesco to AUTHORS <br/>
* [#500](https://github.com/sympy/symengine/pull/500) - Expression wrapper. <br/>

**Documentation** <br/>
[En route to Polynomial](https://github.com/sympy/symengine/wiki/En-route-to-Polynomial)

### Targets for Week 8

Get the `Polynomial` wrapper merged.

Points to be noted: <br/>
* Use standard library alternates to Piranha constructs so that we can have something even when there is no Piranha as dependency. <br/>
* Basic class in, so that [Shivam](https://github.com/shivamvats) can start some work in SymEngine. <br/>

I am thankful to [Ondřej](https://github.com/certik) and the `SymEngine` team for bearing with my delays. I hope I can compensate in the coming week. 

That's all this week. <br/>
**Adéu**
