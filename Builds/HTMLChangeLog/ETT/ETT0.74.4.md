---
title: "Etterna 0.74.4"
source: "https://github.com/etternagame/etterna/releases/tag/v0.74.4"
---

**\[0.74.4\] - 2025-04-01**
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
    *   Removed GameCommands `url` and `urlnoexit` to resolve a security vulnerability existing in user generated content
        *   This means Lua can no longer arbitrarily open urls
        *   Replacement methods added:
            *   `DLMAN:GetProjectPage()`
            *   `DLMAN:ShowBugReportSite()`
            *   `DLMAN:ShowEditorSite()`
            *   `DLMAN:ShowProjectReleases()`
            *   `DLMAN:ShowProjectSite()`
            *   `DLMAN:ShowPackPage(packid)`
            *   `DLMAN:ShowUserPage(username)`
            *   `DLMAN:ShowScorePage(username, scoreid)`
            *   `pack:DownloadExternally()`
        *   Theme editors, refer to this commit for further advice: [here](https://github.com/etternagame/etterna/commit/eea94e23d1f3cfc0220a60f4c3c73e9787c5d71e)
    *   Player Overall rating is once again an average of all your skillsets
    *   Added Lua access to `HighScore:GetCountryCode()`
    *   Beginner and Novice pack bundles are swapped
    *   Added translation support to the default Judgment names
*   **Rebirth**
    *   Added some quotes

**Development**
===============

*   There are 2 versions of this release. The other version is an April Fools edition with removed Jacks/Chordjacks and funny translated text. Both versions are nearly identical in the executable besides SQLiteCpp
*   Updated SQLiteCpp to 3.3.2
*   Changed the minimum cmake version for every dependency to 3.5 because GHA refuses to work suddenly