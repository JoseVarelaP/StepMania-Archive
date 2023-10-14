---
title: "OpenITG, alpha 6"
---

```
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