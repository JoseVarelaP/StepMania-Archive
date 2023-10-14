---
title: "OpenITG, alpha 5"
---

```
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