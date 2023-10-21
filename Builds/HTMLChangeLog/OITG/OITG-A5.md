---
title: "OpenITG, alpha 5"
---

```
OpenITG, alpha 5 (April 30th, 2008)
-----------------------------------

Another night well-spent working on OpenITG instead of doing homework or, god
forbid, sleeping. Ah, well, it's worth it when we get to this stage. :) Apologies
for taking so long to get this release out - meatlife is tiring sometimes.

For alpha 5, we've put more emphasis on making the program arcade-friendly.
ITGIO input works fine, and PIUIO is completely functional. We've also backported
4.0's InputFilter, enabling InputDebounceTime as well as improved input handling.
ScreenArcadeStart is also functional, and a few bugs affecting arcade play have
been fixed.

Combine that with our install script, and this build is basically ready for
dedicated cabinets (or upgrades, if you don't mind the lights stuck on). :D

-New screens:
    ScreenArcadeStart - implemented, functional, does stuff
-Code structure changes:
    Reboot-on-crash is disabled in non-arcade builds
    Gameplay lights now autogen from dance-single only
    InputHandler_Linux_Iow changed to InputHandler_Iow
    InputHandler_Linux_PIUIO changed to InputHandler_PIUIO
    InputFilter backported from 4.0, modified a bit
-PIUIO changes:
    Added timer for testing input speed
    Partially added coin counter code (not functional yet)
    Changed input from 64-bit datatype to 32-bit datatype
-Fixed input bugs:
    Input always auto-remaps on startup
    Input sometimes locks up after song loading fails
    Player 2 I/O board input is mapped to Player 1's side
    PIUIO only reports arrow presses from right sensor
-Fixed general bugs:
    Edits for Single show on all difficulties
    Some modifiers don't animate in the editor
    Song wheel can be moved on Chance
    Voltage doesn't calculate correctly (lol, DDR)
-Fixed mistakes:
    "ITGIO" and "PIUIO" were reversed in RageInputDevice
-Mapping changes:
    Added working Iow input mappings (output is still borked)
    Added working service/test and coin mappings for PIUIO
-New code functions:
    LOG->Debug() - always displays to stdout, without logging
    GetIP() - currently Linux-only, returns IP and subnet
-New preferences:
    "CustomSongPreviews" - play audio previews of custom songs
    "InputDebounceTime" - self-explanatory; smooth out bouncing input
-New USB profile features:
    "AdditionalSpeedMods" - add specified speed modifiers
```