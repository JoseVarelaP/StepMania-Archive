---
title: "Etterna 0.74.1"
source: "https://github.com/etternagame/etterna/releases/tag/v0.74.1"
---

**\[0.74.1\] - 2024-12-26**
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

**Changes/Updates**
===================

*   **General**
    *   The crash messages talking about "readAhead" caused by the audio system should tell you how to deal with the crash
*   **Til' Death**
    *   The song wheel will stay on the hovered song when you make a search unless the search filters out that song

**Fixes**
=========

*   **General**
    *   Frequent random crashes on any file access due to DelFileSet
    *   Maybe reduced random crashes on Linux caused by the parallelization of Noterow timestamp precalculation in gameplay
*   **Til' Death**
    *   Changing music rate in PlayerOptions didn't update any of the text and stuff correctly

**Development**
===============

*   undid FileSet changes