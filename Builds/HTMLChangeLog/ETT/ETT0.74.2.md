---
title: "Etterna 0.74.2"
source: "https://github.com/etternagame/etterna/releases/tag/v0.74.2"
---

**\[0.74.2\] - 2024-12-27**
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

**Fixes**
=========

*   **General**
    *   Random crashing when entering gameplay caused by heap corruption
        *   This was mostly experienced by Linux players but may have affected anyone
        *   The result of this is that the optimization for row time precalculation is changed to be more correct, and some files with insane amounts of noterows (> 1 million) will once again take a while to load. But it won't be too long of a while, because the optimization just parallelizes the calculation. For me on 16 threads, it takes about 5 seconds to load a file with 800000 rows, rather than 15-60 seconds