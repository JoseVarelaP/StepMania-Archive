---
title: "OpenITG, alpha 6"
---

```
OpenITG, alpha 6 (May 30th, 2008, r364)
---------------------------------------

First off, sorry for the late release. Migraines are totally disabling 
things. :/ I've learned about putting this project before my health from 
the strep infection, though, and at least it's out today.

I didn't catch a dumb mistake of mine before release, and pat can't recompile
until later, so you'll have to manually exit ScreenArcadeStart or it'll keep
reloading. Not too much trouble, just press Start to get out.

This is later than I expected it would be, but that's okay, since we spent
a lot of time working on bug-fixing. Every bug from 3.95 should be fixed now,
as well as a few major ones we got in development. We also added a few tweaks
and features that we agreed would be useful/good to have, so read on and see
what the new build has to offer. :)

The backported InputFilter is gone, due to the problems it caused. The
InputDebounceTime code was implemented from CNLohr's 3.9 AC6 build, and seems
to work fine, so I think we can settle on that.

InputHandler_PIUIO's Linux kernel-call function isn't ready for a release, and
we're overdue for one, so it's been reverted to the old Write/Read functions.
As a result, it still performs poorly on r11+ machines with USB 1.1. Sorry
about that. (For reference, the handler's SVN revision is r288).

ITGIO is still Read()-only and still needs development. I haven't had the
time or the gasoline, so if you have access to an upgrade, please contact us.

The rest of the code is actually quite sexy. Check it out.

One last thing (sorry to bore you like this) - arcade builds are available
for Windows/Linux in the SVN [http://reenigne.ath.cx/svn/] - check "program"
and "linux" respectively.

-Code structure changes:
    Reverted InputFilter - too little gain for too many problems
-New metrics in ScreenGameplay:
    (Note: must be in Event Mode, Versus, and playing the same chart)
    "ScorePxAheadCommand" - played when player's score is higher
    "ScorePxBehindCommand" - played when player's score is lower
-New preferences:
    "InputDebounceTime" - self-explanatory
-New game commands:
    "clearcredits" - clears credits on the machine (useful for testing)
    "theme" - sets the theme, by name, when used (useful for theme switchers)
-Linux changes:
    Tentative fix for memory card port/bus detection on usb_storage
-Win32 changes:
    Added code to reboot on crashes for arcade builds (#define ITG_ARCADE)
-Misc. changes:
    Enabled pad lighting on ScreenDemonstration
    Coins added by GameCommands are not counted toward bookkeeping totals
    Round text on ScreenSelectMusic updates for long/marathon songs
    Moved OpenITG-specific profile options to Extra.ini (caused ITG2 crashes)
    Disabled autogeneration of new Public/Private RSA keys on load failure
-Fixed bugs:
    Some custom songs end immediately after start
    Repeating menu input error on ScreenSelectMusic
    Editor doesn't draw properly, causes failed asserts
    Song wheel doesn't "budge" when attempting to move after Chance
    "Revert from Disk" in editor causes duplicate charts, crashes
    Crash on bookkeeping when switching to an undefined screen
    In AutoplayCPU, rolls cause early judgments of arrows and mines
```