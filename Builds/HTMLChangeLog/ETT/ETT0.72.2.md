---
title: "Etterna 0.72.2"
---

**\[0.72.2\] - 2023-03-01**
===========================

As always, back up your Save. That includes any personal modifications to the Assets folder, Noteskins folder, and the entire Save folder. These folders are usually found in the folder your game is installed.

If you made modifications to Theme files for your custom windows, you will need to save that specific Lua file as well.

MacOS Note
----------

OpenSSL is required. It can be installed with Homebrew:
**NOTE:** If you don't have Homebrew installed already, follow [the instructions from the Homebrew website](https://brew.sh/).

brew install openssl

Linux Note
----------

It has come to our attention that newer versions of some distributions like Ubuntu make it difficult to install the required OpenSSL libraries to run the game. If you try to open the game and are hit with an error complaining about `OPENSSL_1_1_1` not found despite following proper instructions to install it, try this:

wget http://archive.ubuntu.com/ubuntu/pool/main/o/openssl/libssl1.1\_1.1.1f-1ubuntu2\_amd64.deb
sudo dpkg -i libssl1.1\_1.1.1f-1ubuntu2\_amd64.deb

* * *

**Changes/Updates**
===================

*   **General**
    *   Image loading speed improved
        *   Most noticeable for D3D (Windows default) users in Rebirth with wheel banners on or in spawncamping-wallhack
            *   Preliminary testing in Rebirth under these conditions saw average FPS increase 5x while moving the music wheel and holding tab
*   **Rebirth**
    *   Added Wheel Spin Speed to the Settings under `Settings` -> `Graphics` -> `Theme Options 1` -> `Music Wheel Speed`
        *   Use this to change the speed of the wheel movement. This can be useful if the wheel moves oddly slow because of your high framerate
    *   Split Theme Options into 2 categories, `Theme Options 1` and `Theme Options 2`
    *   MeasureBars option was moved to a different place internally - this will cause everyone's setting for it to reset
        *   It already defaulted off, so most people won't notice this
    *   Hovering your mouse over the local player name has a new tooltip that just lets you know that clicking it will rename your local profile
    *   Hovering the blank space between Setting names and Setting values should change the cursor position now
        *   This was disabled before 0.71.0 release because I thought it sucked, but in my opinion the cursor not doing this sucks more
    *   Added title gradient, title logo, and title triangles to the Color Config in the `title` category
        *   Actual new entry names: `LogoE` `LogoTriangle` `ItemTriangle` `GradientColor1` `GradientColor2`
    *   **Player Config now loads per profile**
        *   This means that each profile in Rebirth has its own configuration like 'Til Death does
        *   You don't have to do anything to work around with this, because whatever settings you already have in Rebirth from 0.71.0-0.72.1 will apply as a default for every profile you load
        *   This means that importing settings from 'Til Death is now even easier, and all you have to do is rename the `/LocalProfiles/xxxxxxxx/Til Death_settings/` folder to `/LocalProfiles/xxxxxxxx/Rebirth_settings/`
*   **'Til Death**
    *   Added a Mean Display to Gameplay
        *   Off by default
        *   The option to turn it on is located here: `Player Options` -> `Theme Options` -> `Current Mean`
        *   Only tracks the current mean of the play, not the EWMA
        *   Use `M` or `,` in Customize Gameplay to move or resize it
    *   Tooltip for hovering CDTitle has been reduced in size to a more appropriate level

**Fixes**
=========

*   **General**
    *   BPM Display should support the special BPM display types like "random numbers" again
    *   Fixed crashes relating to abusing certain Rebirth color config and game customization functionality
    *   Fixed crashes caused by placing a random audio file in a pack folder
    *   Fixed crashes and errors caused by renaming a random folder to pretend it has a valid file extension of any kind
        *   If these folders are actual songs, they may load. If they don't successfully load, you will see a message in the log
    *   Fixed crashes caused by selecting a song and finishing a download before reaching gameplay but after picking the song
    *   MacOS crashing occasionally due to an incompatibility with how we find the language of the user
    *   Reloading Scripts or Overlays will no longer break buttons, break mouse functionality, or throw many errors per second
    *   Replays where ghost taps occur before or during the song should no longer horribly desync
    *   Replays which were locally recorded on a different song or global offset should no longer desync
    *   ScreenTextEntry will no longer stop music playback
*   **Rebirth**
    *   Music Wheel will no longer randomly stutter over and over, causing all the graphics to change repeatedly - as long as you are still holding down the directional button
    *   Network Options should no longer show up and allow users to break menu continuity
    *   Song Search will no longer pretend to do nothing in the specific case where you search for an exact song name that exists, but one of the results contains a chart key that becomes filtered out because it is listed with a different song name
    *   ScreenTextEntry will no longer kill the visualizer
*   **'Til Death**
    *   Fixed Evaluation showing the wrong mean for a score that you just set if you hit any mines
    *   ScreenTextEntry will no longer kill the visualizer

**Development**
===============

*   Added ReloadedScriptsMessageCommand triggered by `Ctrl + F2`, by changing Games, or by changing graphics options
*   Added ReloadedMetricsMessageCommand triggered by `Shift + F2`, by `Ctrl + Shift + F2`, or by `F2`
*   Added ReloadedOverlayScreensMessageCommand triggered by `Ctrl + Shift + F2`
*   Added ReloadedTexturesMessageCommand triggered by `F2`
*   Added GameChangedMessageCommand triggered by changing Games. This occurs specifically when changing games using the settings menu
*   Custom Window Config file had some comments added to encourage proper maintenance of the file
*   GetDirListing has a new API which lets you choose between filtering to only directories, only files, or not caring
    *   The previous boolean-based API meant for filtering to only directories or not caring still works the same way
    *   Both APIs are implemented in the Lua binding
    *   New Lua API: `FILEMAN:GetDirListing(pathString, filterType, returnFullPathsBoolean)`
    *   New Lua API filterType: pick one of `any_type` `only_dir` `only_file`
*   Tooltips can be resized easily with new function `TOOLTIP:SetTextSize(x)`
