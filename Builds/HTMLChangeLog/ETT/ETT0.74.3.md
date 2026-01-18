---
title: "Etterna 0.74.3"
source: "https://github.com/etternagame/etterna/releases/tag/v0.74.3"
---

**\[0.74.3\] - 2025-01-11**
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

Previous release
----------------

If you are updating from 0.72 or 0.73 or any other earlier build, you should probably look at the 0.74 release notes: [https://github.com/etternagame/etterna/releases/tag/v0.74.0](https://github.com/etternagame/etterna/releases/tag/v0.74.0)

* * *

**Changes**
===========

*   **General**
    *   Added a new default popn Noteskin. Popn can be loaded via .pms or similar .bms files with 5 or 9 keys
*   **Rebirth**
    *   Added new tip types to show a grade counter in place of tips, or hide the whole thing

**Fixes**
=========

*   **General**
    *   Last note in songs with more than 50000 noterows being invisible and unhittable
        *   This also caused hold notes at the end of those files to be invisible
        *   50000 noterows is typically a marathon file unless it utilizes high bpms or warps
    *   Random assert crashes for users with the new default unpitched rates

**Development**
===============

*   Replaced COMPILE\_ASSERT with C++11 static\_assert so they give real messages instead of template errors that only I know how to read