---
title: "ITGmania v1.0.1"
source: "https://github.com/itgmania/itgmania/releases/tag/v1.0.1"
---

DOWNLOAD [v1.0.2](https://github.com/itgmania/itgmania/releases/tag/v1.0.2) INSTEAD
===================================================================================

\# About

This is the v1.0.1 release of ITGmania. This is a targeted bug fix release of 1.0.0. You'll still want to read the patch notes for 1.0.0 as they are still relevant here. They can be found [here](https://github.com/itgmania/itgmania/releases/tag/v1.0.0)

**NOTE: THIS VERSION WILL REBUILD THE CACHE SO INITIAL BOOT WILL BE SLOW**

\# Features

\## Bugfixes

\- Game crashing on boot when trying to handle very long songs (e.g. 24 hours of 100 bpm from Crapyard Scent) - [@phantom10111](https://github.com/phantom10111)  
\- Game crashing when trying to adjust the Fail Type - [@CrashCringle12](https://github.com/CrashCringle12)  
\- MachineSyncOffset not being properly saved - [@CrashCringle12](https://github.com/CrashCringle12)  
\- Fixing a sync issue when the group offset may have not been properly loaded/applied - [@sukibaby](https://github.com/sukibaby) + [@CrashCringle12](https://github.com/CrashCringle12)  
\- Fix crashes with USBs regarding Pack.ini - [@CrashCringle12](https://github.com/CrashCringle12)  
\- Fixed an issue where refresh rate was reverting to 60Hz between game launches - [@sukibaby](https://github.com/sukibaby)  
\- (Temp fix) Don't do any banner caching for video banners - [@sukibaby](https://github.com/sukibaby)  
\- Modified some dedicated restart button behavior - [@jsirex](https://github.com/jsirex)  
\- MaxNps + GroovestatsHash caching (these are experimental and may be modified in the future! -- do not rely on them until documented) - [@mjvotaw](https://github.com/mjvotaw)

\## Features  
\- Added support to disable cabinet lights per player - [@dando92](https://github.com/dando92)  
\- Add bookkeeping screen - [@dando92](https://github.com/dando92) + [@CrashCringle12](https://github.com/CrashCringle12)  
\- Fixed SextetStream on Windows - [@LucaSilva-r](https://github.com/LucaSilva-r)

\## Simply Love

While these will also be noted in the Simply Love patch notes, I felt it was apt to also mention them here

\- QR Login Screen display not respecting the theme preference - [@Shraymonks](https://github.com/Shraymonks)  
\- QR on the QR login screen not being properly scanned on select Pixel/Android phones (this is a Pixel issue!!!) - [@dinsfire64](https://github.com/dinsfire64)  
\- Show Quint grade in the song wheel - [@teejusb](https://github.com/teejusb)  
\- Preserve some player options when navigating to practice mode - [@CrashCringle12](https://github.com/CrashCringle12)  
\- Add theme option to disable animated banners in step statistics - [@teejusb](https://github.com/teejusb) via [@SugoiFactory](https://github.com/SugoiFactory)

\# Installation

The installation process has largely not changed but you can still refer to the instructions below.

\## Windows

The installer for Windows is not signed, so you will have to click through a couple of security dialogs when running it.

[![](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-1.png)](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-1.png)

[![](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-2.png)](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-2.png)

[![](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-3.png)](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-3.png)

\## macOS

Move ITGmania.app to /Applications. macOS automatically quarantines downloaded applications that are not signed, so you will have to run this command in the terminal afterwards.

xattr -dr com.apple.quarantine /Applications/ITGmania

You will also likely need to allow Input Monitoring for ITGmania. This can be done in:

System Preferences -> Security & Privacy -> Privacy -> Input Monitoring

If ITGmania already exists in this list, you might need to remove + re-add it.

[![image](https://user-images.githubusercontent.com/5017202/173298829-3b4a401b-e5cd-4bb7-b605-290ce7f97fef.png)](https://user-images.githubusercontent.com/5017202/173298829-3b4a401b-e5cd-4bb7-b605-290ce7f97fef.png)

\## Linux

Unpack the tarball to your desired location.

\## Switching from StepMania 5.1 (or StepMania 5.0.12)

Check out the [StepMania 5.1 to ITGmania Migration Guide](https://github.com/itgmania/itgmania/blob/beta/Docs/Userdocs/sm5_migration.md).

* * *

\## Change Summary

Thanks to all who contributed to this release!

For a full summary of changes between v1.0.1 and v1.0.0, check [GitHub's comparison of the two](https://github.com/itgmania/itgmania/compare/v1.0.0...v1.0.1).