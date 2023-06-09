---
title: "Etterna 0.72.3"
source: "https://github.com/etternagame/etterna/releases/tag/v0.72.3"
---

**\[0.72.3\] - 2023-03-21**
===========================

As always, back up your Save. That includes any personal modifications to the Assets folder, Noteskins folder, and the entire Save folder. These folders are usually found in the folder your game is installed.

If you made modifications to Theme files for your custom windows, you will need to save that specific Lua file as well.

MacOS Note
----------

OpenSSL is required. It can be installed with Homebrew:  
**NOTE:** If you don't have Homebrew installed already, follow [the instructions from the Homebrew website](https://brew.sh/).

```shell
brew install openssl
```

Linux Note
----------

It has come to our attention that newer versions of some distributions like Ubuntu make it difficult to install the required OpenSSL libraries to run the game. If you try to open the game and are hit with an error complaining about `OPENSSL_1_1_1` not found despite following proper instructions to install it, try this:

```shell
wget http://archive.ubuntu.com/ubuntu/pool/main/o/openssl/libssl1.1_1.1.1f-1ubuntu2_amd64.deb
sudo dpkg -i libssl1.1_1.1.1f-1ubuntu2_amd64.deb
```

* * *

**Changes/Updates**
===================

* **General**
    * Added FrameLimit and FrameLimitGameplay to Graphics Options in the main menu Options
* **Rebirth**
    * Added FrameLimit and FrameLimitGameplay to the Settings menu under `Graphics` -\> `Global Options 2`
    * Split `Global Options` into `Global Options 1` and `Global Options 2` because I'm running out of room

**Fixes**
=========

* **General**
    * NoteskinPreview crashing the game, caused by a Noteskin failing to load due to `cmd()` or other problems
    * Replays crashing when going wrong and sending impossible judgments to the engine
    * Replays getting horrible judgments, caused by "lift" actions in replays supported by InputData
    * Replays getting temporarily misaligned judgments, caused by hitting mines
* **Rebirth**
    * Lua error causing missing E logo in the help screen

**Development**
===============

* chillin