---
layout: post
title: Week 1 and Week 2 @ EPFL
tags:
  - Intern
  - EPFL
  - LARA
permalink: /Week-1-and-Week-2-at-EPFL
---

![EPFL Logo](/assets/epfl/epfllogo.png)


Hi there! It's been around a year since I updated this space. It's summers again and lot to interesting work to be done, hence I made my mind to get this back to life and keep track of the progress done at EPFL. I had short week 1 and hence, am writing work of two weeks put together.

### Reaching to EPFL

The monday of first week is something that I shall never forget. I had to travel to Delhi to collect my visa. I had to miss two domestic flights that day to get my visa but that was still cheaper than missing my internatinal flight to Lausanne (This day deserves a blog post of it's own :) <br>
Tuesday night was my flight out from Mumbai to Munich and I reached here around the evening of Wednesday. I directly went to EPFL and paid a visit to the team lab. I fortunately met my intern guide, [Ravi](http://lara.epfl.ch/~kandhada/) there and he helped me find my apartment. I've settled in my apartment and it is pretty close to EPFL too.

### First day

Thursday was a public holiday here, I started off my work from Friday. I was introduced to everybody at the Team LARA lab lunch which was organised by [Mikaël](https://github.com/MikaelMayer). I started off my work by getting familiar with Leon and Orb. Ravi patiently explained to me a lot of details of both the systems. My toy task for the day was collapsing tuples in instrumented code which was a simple but necessary exercise.

### First weekend

Not a lot of my friends had arrived to EPFL by this time so I spent this weekend to myself. I mostly got myself familiarised with Scala and implemented a few exercises just to get comfortable. I read the [original Leon paper](http://lara.epfl.ch/~kuncak/papers/BlancETAL13VerificationTranslationRecursiveFunctions.pdf) and got insights to how the system works. I skimmed through the [Orb paper](https://infoscience.epfl.ch/record/190578), I should go through it in more detail in the coming days.

### Second week

I did the following tasks in the second week:

#### runnable

My `runnablecodephase` branch has a new CLI option `--runnable` which generates runnable Scala code after instrumentation. This mostly hooks into the `PrettyPrinter` and does the necessary fixes.

#### Benchmarking

We benchmarked the `runnable` code and compared it with Orb obtained results. The results were pretty interesting and a perfect match in the worst case example for `InsertionSort`. We couldn't get a perfect match for the `PropostionalLogic`, we suspect it is because of difficulty in generating worst case inputs. I am yet to benchmark `ConcTrees`, I and Ravi decided to keep it for later.

All the code for this is in the Pull Request [here](https://github.com/ravimad/Orb2015/pull/7)

#### Memoization - LCS

I and Ravi invested quite some time in implementing the LCS problem as a benchmark for memoization. It uncovered a small bug in Orb. It also led to a [traversal](https://gist.github.com/Sumith1896/979cf662c7833783376e4226a4cff12f) that needs to tested more in Orb.

### Second weekend

This is mostly a travel diary section. All the Europe interns from IIT Bombay had planned a trip to Amsterdam, Netherlands. It was great to meet up all friends(~12 people) coming from different regions of Europe. We spent the night at Luesden which was much more peacful and calm, far from the city rush. After a trip to the Tulip gardens, Keukenhof on Sunday we traveled out of Amsterdam and reached back to Laussane on Monday morning. The cities there were beautiful, Laussane more so and it felt homely after reaching back :')

### Upcoming tasks

Due to travel, I couldn't work during the weekend. The following tasks await, in decreasing order of priority:

* Implement lazy examples from the [Haskell library](https://downloads.haskell.org/~ghc/latest/docs/html/libraries/)
* Instrument object allocation
* Fix other examples in the memoization section

Some other tasks that also needs work:

* Investigate the OrderedFill example, make it work in Orb. LCS can be polished after this.
* Read the Orb technical reports

That's all for this time. Come back next week.

Thank you. <br/>
**doei**
