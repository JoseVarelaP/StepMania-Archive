---
title: "OpenITG, alpha 7"
---

```
-Preliminary, hacky lights-cabinet support in theme SM files
-Barebones work on tournament mode (it's still a while away)
-Input changes:
    Newer, more ITG-like input debouncing (half-working...)
    "Select" or "MenuLeft+MenuRight" cancels custom song loading
    Linux joystick driver is now threaded (and supports DebugUSBInput)
    X11 input code backported from 4.0
-New LUA functions:
    IsUsingMemoryCard(PlayerNumber) - self-explanatory
    Debug() - output debugging lines regardless of log settings
-New LUA globals:
    "OPENITG" (boolean) - can be used for compatibility with ITG2 AC scripts
-New (major) code functions:
    StepsUtil::RemoveStepsOutsideMeterRange()
    StepsUtil::RemoveStepsOutsideDifficultyRange()
    Song::HasStepsWithinMeterRange()
-New messages:
    "CardReadyP1", "CardReadyP2" - played when a card is verified ready
-New preferences:
    "SoundVolumeAttract" - volume during attract sequences
    "ThreadedLights" - run the lights outside the regular game loop, more accurate
    "UseUnstablePIUIODriver" - set true to use the experimental I/O driver
-New config options:
    "SoundVolumeAttract" - see above
-New metrics:
    "CompareScores" (ScreenGameplay) - manually set whether to compare or not
    "OptionsList" (ScreenSelectMusic) - add a side panel to change options
	instead of the old options menu
-New Screens:
    "ScreenExitCommand" - Functions as ScreenExit, but with the ability to launch
       	an executable file before exiting.  Must have 'ExecPath' and 'ExecParams' in the
        metrics entry
    "ScreenTextEntryArcade" - a more arcade-friendly text entry screen (WIP)
-Fixed bugs:
    BGCHANGES2 charts don't play properly
    Timer is stuck at 0 if timer runs out on "Chance"
    "nomines" and "nostretch" transforms have no effect in the editor menu
    (OpenGL) Arrow shader fails on full-screen, causing scrolling brackets
    Actor sounds ignore attract sound settings
    After switching themes, OpenITG crashes on the songwheel
    Theme switching sometimes causes failed asserts
    Phantom input when canceling custom song loads
    ScreenArcadeStart loops endlessly until manual exit
    Without song previews, custom song lights don't properly load
-Fixed mistakes:
    Removed some personalized testing code
    Removed some annoying opendir() error messages
-Code structure changes:
    "MiscITG" moved to "DiagnosticsUtil"
```