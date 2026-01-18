---
title: "ITGmania v1.1.0"
source: "https://github.com/itgmania/itgmania/releases/tag/v1.1.0"
---

About
=====

This is the release generally targeting at the upcoming Stamina RPG 9 event. There are also some bug fixes and QoL what we'll describe below. A big discovery is explicitly setting SoundPreferredSampleRate in preferences will alleviate a lot of music drift/lag. On a lot of modern hardware on Windows, this should be set to 48,000Hz. There is now an operator menu preference to make setting this a lot easier but one will still need to currently manually set that.

Changes
=======

Features
--------

[@teejusb](https://github.com/teejusb) - Added Assist Clap text to Screen Gameplay  
[@Pkgam](https://github.com/Pkgam) - Added Robot and Vivid noteskins, updated some existing noteskin graphics  
[@dando92](https://github.com/dando92) + [@dinsfire64](https://github.com/dinsfire64) - Added hidapi support so that we can more easily add drivers in the future  
[@pnn64](https://github.com/pnn64) + [@sukibaby](https://github.com/sukibaby) - Discovery of the value of explicitly setting Sample Rate to match the audio device to prevent drift

Bugfixes
--------

[@bwaggone](https://github.com/bwaggone) - Fix bug where P2 didn't work correctly in Practice Mode

Code Health/Internal
--------------------

[@ScottBrenner](https://github.com/ScottBrenner) - TONS of Continuous Integration fixes  
[@aeubanks](https://github.com/aeubanks) - Started the effort to migrate from RString -> std::string  
[@sukibaby](https://github.com/sukibaby) - Tons of various engine improvements

Installation
============

The installation process has largely not changed but you can still refer to the instructions below.

Windows
-------

The installer for Windows is not signed, so you will have to click through a couple of security dialogs when running it.

[![](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-1.png)](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-1.png)

[![](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-2.png)](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-2.png)

[![](https://private-user-images.githubusercontent.com/5017202/457771543-b5a373a9-1758-44f1-8bd5-a342313c5e79.png?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3Njg3NTk0MjcsIm5iZiI6MTc2ODc1OTEyNywicGF0aCI6Ii81MDE3MjAyLzQ1Nzc3MTU0My1iNWEzNzNhOS0xNzU4LTQ0ZjEtOGJkNS1hMzQyMzEzYzVlNzkucG5nP1gtQW16LUFsZ29yaXRobT1BV1M0LUhNQUMtU0hBMjU2JlgtQW16LUNyZWRlbnRpYWw9QUtJQVZDT0RZTFNBNTNQUUs0WkElMkYyMDI2MDExOCUyRnVzLWVhc3QtMSUyRnMzJTJGYXdzNF9yZXF1ZXN0JlgtQW16LURhdGU9MjAyNjAxMThUMTc1ODQ3WiZYLUFtei1FeHBpcmVzPTMwMCZYLUFtei1TaWduYXR1cmU9OGIxNzFjMTUwZDY4OGJlM2JhNThhMjEyY2Q2MGY0NDFlOTA0OWM0NTdkNGE0OWU1ZmM2Y2QzZDVmOTk2OWRiNCZYLUFtei1TaWduZWRIZWFkZXJzPWhvc3QifQ.m41uPoDAV-sDUxmEOoarmOgjKZ7z-dXTnSl9qKHsP94)](https://private-user-images.githubusercontent.com/5017202/457771543-b5a373a9-1758-44f1-8bd5-a342313c5e79.png?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3Njg3NTk0MjcsIm5iZiI6MTc2ODc1OTEyNywicGF0aCI6Ii81MDE3MjAyLzQ1Nzc3MTU0My1iNWEzNzNhOS0xNzU4LTQ0ZjEtOGJkNS1hMzQyMzEzYzVlNzkucG5nP1gtQW16LUFsZ29yaXRobT1BV1M0LUhNQUMtU0hBMjU2JlgtQW16LUNyZWRlbnRpYWw9QUtJQVZDT0RZTFNBNTNQUUs0WkElMkYyMDI2MDExOCUyRnVzLWVhc3QtMSUyRnMzJTJGYXdzNF9yZXF1ZXN0JlgtQW16LURhdGU9MjAyNjAxMThUMTc1ODQ3WiZYLUFtei1FeHBpcmVzPTMwMCZYLUFtei1TaWduYXR1cmU9OGIxNzFjMTUwZDY4OGJlM2JhNThhMjEyY2Q2MGY0NDFlOTA0OWM0NTdkNGE0OWU1ZmM2Y2QzZDVmOTk2OWRiNCZYLUFtei1TaWduZWRIZWFkZXJzPWhvc3QifQ.m41uPoDAV-sDUxmEOoarmOgjKZ7z-dXTnSl9qKHsP94)

macOS
-----

Move ITGmania.app to /Applications. macOS automatically quarantines downloaded applications that are not signed, so you will have to run this command in the terminal afterwards.

xattr -dr com.apple.quarantine /Applications/ITGmania

You will also likely need to allow Input Monitoring for ITGmania. This can be done in:

System Preferences -> Security & Privacy -> Privacy -> Input Monitoring

If ITGmania already exists in this list, you might need to remove + re-add it.

[![image](https://user-images.githubusercontent.com/5017202/173298829-3b4a401b-e5cd-4bb7-b605-290ce7f97fef.png)](https://user-images.githubusercontent.com/5017202/173298829-3b4a401b-e5cd-4bb7-b605-290ce7f97fef.png)

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

For a full summary of changes between v1.1.0 and v1.0.2, check [GitHub's comparison of the two](https://github.com/itgmania/itgmania/compare/v1.0.2...v1.1.0).