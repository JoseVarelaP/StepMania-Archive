---
title: "Etterna 0.72.1"
source: "https://github.com/etternagame/etterna/releases/tag/v0.72.1"
---

**\[0.72.1\] - 2023-01-09**
===========================

As always, back up your Save. That includes any personal modifications to the Assets folder, Noteskins folder, and the entire Save folder. These folders are usually found in the folder your game is installed.

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
    *   Cleartypes changed to not grant SDP/SDG if the score contains a combo breaker
    *   Holding `shift` while pressing the Random Song button will bring you to the last song that was given by pressing the button
        *   This only works backwards once, like a simple undo button. You can't go backwards several songs, only one
    *   Noteskin Preview was optimized for loading times
        *   SelectMusic entry in Rebirth should be noticeably faster
        *   PlayerOptions (double enter) in all themes should be noticeably faster

**Fixes**
=========

*   **General**
    *   Buttons bound to `Operator` will no longer be impossible to type in a text field
    *   Files loaded from `.osu` should never crash due to 0-length holds
    *   Judge 1-3 should never visually show up anywhere anymore
    *   Legacy Options row for input debounce should no longer be useless and broken
        *   Now featuring increments of 1ms instead of 10ms
    *   Mac players sometimes could not run the game due to an SSH related error for our recent builds
    *   Pack Downloads for packs containing paths with "unacceptable" names will no longer cause the pack to either completely fail or partially extract
        *   Invalid paths are renamed to make them valid. The game should handle these new names with auto resolving logic per song
        *   An invalid character is considered anything with a byte value over 122 (so pretty much only ASCII characters are allowed)
    *   Replays no longer miss the first note if you hit them early
    *   Replays should no longer play very early or very late
        *   This was caused by having multiple charts with the same chartkey but with different audio and offsets
    *   Replays should delete decompressed InputData after failing to read from it
*   **'Til Death**
    *   Judgment Animations and Combo Animations no longer break the customize gameplay resizes you have set

**Development**
===============

*   Added a Lua binding to NoteskinManager to allow adding Noteskin Actors as children to a given ActorFrame. This is mainly to help with Noteskin Preview optimization, but could be used cleverly in real noteskins
*   GHA will automatically generate documentation for us at every commit. This means that the documentation follows the latest develop branch. This includes a "wiki" like resource, doxygen output for C++, and ldoc output for Lua. In due time, we will be updating this documentation to be more complete. It will be a large task.
    *   [https://etternagame.github.io/etterna/](https://etternagame.github.io/etterna/)
*   websocketpp updated to 0.8.2
*   websocketpp should no longer cause the game to be unable to compile under C++20 with very modern compilers
