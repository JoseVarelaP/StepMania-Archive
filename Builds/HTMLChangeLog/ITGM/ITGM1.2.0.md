---
title: "ITGmania v1.2.0"
source: "https://github.com/itgmania/itgmania/releases/tag/v1.2.0"
---

About
=====

ITGmania 1.2.0 is a significant release featuring major performance improvements, expanded hardware support, powerful developer tooling, and a wide range of bug fixes. A highlight of this release is parallel song loading, which should reduce startup time for larger song libraries. We also introduced threaded networking which should help with websocket performance, especially for the experimental Online Lobbies feature. There is also a new Lua debugger for theme developers, NoteSkin variant support, and new HID input drivers for arcade hardware including Pump, STAC2, Fusion, GPB, and Minimaid. macOS users benefit from improved keyboard input via a new NSEvent driver, as well as a critical VSync fix. Under the hood, the codebase received a sweeping cleanup including the full migration from RString to std::string, removal of legacy dead code, and clang-format enforcement across the entire source tree.

**NOTE: There are MAJOR macOS Structural changes. Please read the macOS section below on how to facilitate the migration.**

Changes
=======

Features
--------

[@aryla](https://github.com/aryla) + @jstyql — Parallel song loading for dramatically faster startup times on large libraries  
[@teejusb](https://github.com/teejusb) — HTTP/WebSocket worker threads  
[@aryla](https://github.com/aryla) — Added a Lua debugger server for theme and script developers, with full documentation  
[@CrashCringle12](https://github.com/CrashCringle12) — NoteSkin variant support via an optional variants/ subfolder within a NoteSkin  
[@CrashCringle12](https://github.com/CrashCringle12) — Dynamic option row hiding and showing with new Lua bindings  
[@dinsfire64](https://github.com/dinsfire64) — Various input driver support (Pump LXIO, STAC2, Fusion, Game Pad Board, Minimaid HID driver for lights, Threaded Lights for reactive menu lights).  
[@sukibaby](https://github.com/sukibaby) — NSEvent-based keyboard input driver and VSync fix for macOS

Bugfixes
--------

[@sukibaby](https://github.com/sukibaby) — Fixed audio clipping bug on macOS and JACK  
[@sukibaby](https://github.com/sukibaby) — Fixed potential null dereference in RageFile  
[@sukibaby](https://github.com/sukibaby) — Fixed Linux joystick exception handling; added exception for Cobalt Flux adapter  
[@CrashCringle12](https://github.com/CrashCringle12) — Fixed music wheel portal/roulette behavior  
[@CrashCringle12](https://github.com/CrashCringle12) — Fixed random song roulette to correctly pick and lock to a single song  
[@CrashCringle12](https://github.com/CrashCringle12) — Fixed keysound handling regression  
[@aryla](https://github.com/aryla) — Fixed bugs in TimingData::NoteRowToMeasureAndBeat  
[@aryla](https://github.com/aryla) — Fixed peak NPS calculation outputting infinity  
[@aryla](https://github.com/aryla) — Fixed song cache corrupting entries containing special characters  
[@aryla](https://github.com/aryla) — Fixed saving attacks  
[@aryla](https://github.com/aryla) — Fixed MeasureInfo incorrectly including fake notes in NPS calculation  
[@aryla](https://github.com/aryla) — Fixed thread-unsafe concurrent access in SetCheckpoint, ImageCache, FilenameDB, and RageSurfaceUtils  
[@dinsfire64](https://github.com/dinsfire64) — Fixed pacdrive byte ordering bug  
[@mjvotaw](https://github.com/mjvotaw) — Fixed #FAKES handling in StepParity calculations  
[@mjvotaw](https://github.com/mjvotaw) — Fixed timing tags written with only 3 digits of precision (now 6)  
[@bwaggone](https://github.com/bwaggone) — Fixed video frame display issues in movie textures (sws\_scale return value handling)  
[@sukibaby](https://github.com/sukibaby) — Fixed deprecated symbol lookup on macOS

Code Health/Internal
--------------------

[@aeubanks](https://github.com/aeubanks) — Completed migration of RString → std::string  
[@aeubanks](https://github.com/aeubanks) — Applied clang-format across the entire codebase  
[@teejusb](https://github.com/teejusb) — Added clang-format check to CI for automated code style enforcement  
[@aryla](https://github.com/aryla) — Added mutex to SongCacheIndex for thread safety  
[@mjvotaw](https://github.com/mjvotaw) — Significant StepParity performance improvements: bit masks, pre-calculated distances, implicit graph edges, permutation cache moved to StageLayout  
[@sukibaby](https://github.com/sukibaby) — Modernized Win32 crash handler for 64-bit and modern MSVC  
[@sukibaby](https://github.com/sukibaby) — Added generic Unix and AArch64 signal backtrace support (improves crash reports on Apple Silicon)  
[@sukibaby](https://github.com/sukibaby) — Removed legacy RageSoundDriver\_WDMKS (Windows WDM-KS audio driver)

Installation
============

The installation process has largely not changed but you can still refer to the instructions below.

Windows
-------

The installer for Windows is not signed, so you will have to click through a couple of security dialogs when running it.

[![](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-1.png)](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-1.png)

[![](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-2.png)](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-2.png)

[![](https://private-user-images.githubusercontent.com/5017202/457771543-b5a373a9-1758-44f1-8bd5-a342313c5e79.png?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3NzgxODA0ODAsIm5iZiI6MTc3ODE4MDE4MCwicGF0aCI6Ii81MDE3MjAyLzQ1Nzc3MTU0My1iNWEzNzNhOS0xNzU4LTQ0ZjEtOGJkNS1hMzQyMzEzYzVlNzkucG5nP1gtQW16LUFsZ29yaXRobT1BV1M0LUhNQUMtU0hBMjU2JlgtQW16LUNyZWRlbnRpYWw9QUtJQVZDT0RZTFNBNTNQUUs0WkElMkYyMDI2MDUwNyUyRnVzLWVhc3QtMSUyRnMzJTJGYXdzNF9yZXF1ZXN0JlgtQW16LURhdGU9MjAyNjA1MDdUMTg1NjIwWiZYLUFtei1FeHBpcmVzPTMwMCZYLUFtei1TaWduYXR1cmU9ODVhMzBlNjk4MzQ5OWE5ZmQxMTgzODdmYzhjZjdiNTVmN2VkYTMxMTE3YTMwMWM3NDgyYTI5Njc1NmFjMDYzMSZYLUFtei1TaWduZWRIZWFkZXJzPWhvc3QmcmVzcG9uc2UtY29udGVudC10eXBlPWltYWdlJTJGcG5nIn0.eUs4uSZLvrTHkOPIhNS4oRgNwY4knEpVKKvv64Vfs_Y)](https://private-user-images.githubusercontent.com/5017202/457771543-b5a373a9-1758-44f1-8bd5-a342313c5e79.png?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3NzgxODA0ODAsIm5iZiI6MTc3ODE4MDE4MCwicGF0aCI6Ii81MDE3MjAyLzQ1Nzc3MTU0My1iNWEzNzNhOS0xNzU4LTQ0ZjEtOGJkNS1hMzQyMzEzYzVlNzkucG5nP1gtQW16LUFsZ29yaXRobT1BV1M0LUhNQUMtU0hBMjU2JlgtQW16LUNyZWRlbnRpYWw9QUtJQVZDT0RZTFNBNTNQUUs0WkElMkYyMDI2MDUwNyUyRnVzLWVhc3QtMSUyRnMzJTJGYXdzNF9yZXF1ZXN0JlgtQW16LURhdGU9MjAyNjA1MDdUMTg1NjIwWiZYLUFtei1FeHBpcmVzPTMwMCZYLUFtei1TaWduYXR1cmU9ODVhMzBlNjk4MzQ5OWE5ZmQxMTgzODdmYzhjZjdiNTVmN2VkYTMxMTE3YTMwMWM3NDgyYTI5Njc1NmFjMDYzMSZYLUFtei1TaWduZWRIZWFkZXJzPWhvc3QmcmVzcG9uc2UtY29udGVudC10eXBlPWltYWdlJTJGcG5nIn0.eUs4uSZLvrTHkOPIhNS4oRgNwY4knEpVKKvv64Vfs_Y)

macOS
-----

Move ITGmania.app to /Applications. macOS automatically quarantines downloaded applications that are not signed, so you will have to run this command in the terminal afterwards.

xattr -dr com.apple.quarantine /Applications/ITGmania.app

**NEW FOR THIS RELEASE!! PLEASE READ EVERYTHING BELOW!!**  
The ITGmania.app is now ships as a single file that can be placed in the `/Applications` folder directly (similar to how other apps are packeged). In order to make it Portable, the simplest would be create a folder containing ITGmania.app and then add a `Portable.ini` as usual.

Additionally with this release, we now consolidate all the macOS ITGmania application folders. Previously, various folders were spread out across the file system. With this release, we migrate everything to the singular `~/Library/Application Support/ITGmania` folder. Specifically, see below:

*   `~/Library/Preferences/ITGmania` -> `~/Library/Application Support/ITGmania/Save`
*   `~/Library/Caches/ITGmania Screenshots` -> `~/Library/Application Support/ITGmania/Screenshots`
*   `~/Library/Caches/ITGmania` -> `~/Library/Application Support/ITGmania/Cache`
*   `~/Library/Logs/ITGmania` -> `~/Library/Application Support/ITGmania/Logs`

**MAKE SURE YOU MAKE A BACKUP BEFORE YOU LAUNCH THE ITGmania v1.2.0 JUST IN CASE!!**

With this new 1.2.0 release, it will do a best effort to automatically peform this migration. Specifically it will do the following:

*   Delete the `~/Library/Caches/ITGmania` and `~/Library/Logs/ITGmania` folders (Cache and Logs will be regenerated on first boot)
*   Migrates the Screenshots + Save folders. If there are conflicts, it will retain the source folders, otherwise it will migrate accordingly.

Previously Applications would look like:

[![image](https://private-user-images.githubusercontent.com/5017202/566094802-a93e4258-dce0-45be-9e74-bf4fc09e2d1a.png?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3NzgxODA0ODAsIm5iZiI6MTc3ODE4MDE4MCwicGF0aCI6Ii81MDE3MjAyLzU2NjA5NDgwMi1hOTNlNDI1OC1kY2UwLTQ1YmUtOWU3NC1iZjRmYzA5ZTJkMWEucG5nP1gtQW16LUFsZ29yaXRobT1BV1M0LUhNQUMtU0hBMjU2JlgtQW16LUNyZWRlbnRpYWw9QUtJQVZDT0RZTFNBNTNQUUs0WkElMkYyMDI2MDUwNyUyRnVzLWVhc3QtMSUyRnMzJTJGYXdzNF9yZXF1ZXN0JlgtQW16LURhdGU9MjAyNjA1MDdUMTg1NjIwWiZYLUFtei1FeHBpcmVzPTMwMCZYLUFtei1TaWduYXR1cmU9OTEwZDA3ZDhjMTlmZjViN2FjZDA5YzE1ZDM0MjYwYzczMTVjNDcxYWEwZjc4YzEzYmUxNWRiNDM4YzBlNmYxZiZYLUFtei1TaWduZWRIZWFkZXJzPWhvc3QmcmVzcG9uc2UtY29udGVudC10eXBlPWltYWdlJTJGcG5nIn0.yUM0stkQSAK-khZumVoA5-phOUO0RRlFTESg4y5yeAI)](https://private-user-images.githubusercontent.com/5017202/566094802-a93e4258-dce0-45be-9e74-bf4fc09e2d1a.png?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3NzgxODA0ODAsIm5iZiI6MTc3ODE4MDE4MCwicGF0aCI6Ii81MDE3MjAyLzU2NjA5NDgwMi1hOTNlNDI1OC1kY2UwLTQ1YmUtOWU3NC1iZjRmYzA5ZTJkMWEucG5nP1gtQW16LUFsZ29yaXRobT1BV1M0LUhNQUMtU0hBMjU2JlgtQW16LUNyZWRlbnRpYWw9QUtJQVZDT0RZTFNBNTNQUUs0WkElMkYyMDI2MDUwNyUyRnVzLWVhc3QtMSUyRnMzJTJGYXdzNF9yZXF1ZXN0JlgtQW16LURhdGU9MjAyNjA1MDdUMTg1NjIwWiZYLUFtei1FeHBpcmVzPTMwMCZYLUFtei1TaWduYXR1cmU9OTEwZDA3ZDhjMTlmZjViN2FjZDA5YzE1ZDM0MjYwYzczMTVjNDcxYWEwZjc4YzEzYmUxNWRiNDM4YzBlNmYxZiZYLUFtei1TaWduZWRIZWFkZXJzPWhvc3QmcmVzcG9uc2UtY29udGVudC10eXBlPWltYWdlJTJGcG5nIn0.yUM0stkQSAK-khZumVoA5-phOUO0RRlFTESg4y5yeAI)

Now ITGmania can live alongside all the other Applications as usual:

[![image](https://private-user-images.githubusercontent.com/5017202/566095156-b3d35c92-2294-4f17-916d-109af5ec38e2.png?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3NzgxODA0ODAsIm5iZiI6MTc3ODE4MDE4MCwicGF0aCI6Ii81MDE3MjAyLzU2NjA5NTE1Ni1iM2QzNWM5Mi0yMjk0LTRmMTctOTE2ZC0xMDlhZjVlYzM4ZTIucG5nP1gtQW16LUFsZ29yaXRobT1BV1M0LUhNQUMtU0hBMjU2JlgtQW16LUNyZWRlbnRpYWw9QUtJQVZDT0RZTFNBNTNQUUs0WkElMkYyMDI2MDUwNyUyRnVzLWVhc3QtMSUyRnMzJTJGYXdzNF9yZXF1ZXN0JlgtQW16LURhdGU9MjAyNjA1MDdUMTg1NjIwWiZYLUFtei1FeHBpcmVzPTMwMCZYLUFtei1TaWduYXR1cmU9YWJlODViZjIwZjliMGI5ZGQ4Y2NkOTFmNmQwZmZhNmFhYTY3ODczNjU4MzhmNzNkZTc5N2RhMDc3NTgxMmM0NyZYLUFtei1TaWduZWRIZWFkZXJzPWhvc3QmcmVzcG9uc2UtY29udGVudC10eXBlPWltYWdlJTJGcG5nIn0.uozPmLFtFNUtnj5QLJ_r9Wa8Rg1I_c9CdlPb5uGVR-A)](https://private-user-images.githubusercontent.com/5017202/566095156-b3d35c92-2294-4f17-916d-109af5ec38e2.png?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3NzgxODA0ODAsIm5iZiI6MTc3ODE4MDE4MCwicGF0aCI6Ii81MDE3MjAyLzU2NjA5NTE1Ni1iM2QzNWM5Mi0yMjk0LTRmMTctOTE2ZC0xMDlhZjVlYzM4ZTIucG5nP1gtQW16LUFsZ29yaXRobT1BV1M0LUhNQUMtU0hBMjU2JlgtQW16LUNyZWRlbnRpYWw9QUtJQVZDT0RZTFNBNTNQUUs0WkElMkYyMDI2MDUwNyUyRnVzLWVhc3QtMSUyRnMzJTJGYXdzNF9yZXF1ZXN0JlgtQW16LURhdGU9MjAyNjA1MDdUMTg1NjIwWiZYLUFtei1FeHBpcmVzPTMwMCZYLUFtei1TaWduYXR1cmU9YWJlODViZjIwZjliMGI5ZGQ4Y2NkOTFmNmQwZmZhNmFhYTY3ODczNjU4MzhmNzNkZTc5N2RhMDc3NTgxMmM0NyZYLUFtei1TaWduZWRIZWFkZXJzPWhvc3QmcmVzcG9uc2UtY29udGVudC10eXBlPWltYWdlJTJGcG5nIn0.uozPmLFtFNUtnj5QLJ_r9Wa8Rg1I_c9CdlPb5uGVR-A)

You can recreate the above structure for Portable use cases and it will work as expected.

Linux
-----

Unpack the tarball to your desired location.

Switching from StepMania 5.1 (or StepMania 5.0.12)
--------------------------------------------------

Check out the [StepMania 5.1 to ITGmania Migration Guide](https://github.com/itgmania/itgmania/blob/beta/Docs/Userdocs/sm5_migration.md).

* * *

Change Summary
--------------

Specific contributors have been tagged appropriately above already.

Thanks to all who contributed to this release!

For a full summary of changes between v1.2.0 and v1.1.0, check [GitHub's comparison of the two](https://github.com/itgmania/itgmania/compare/v1.1.0...v1.2.0).