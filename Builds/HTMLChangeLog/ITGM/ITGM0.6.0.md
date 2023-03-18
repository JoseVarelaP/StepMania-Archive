---
title: "ITGmania v0.6.0"
---

About
=====

This is the v0.6.0 release of ITGmania. This release mostly focuses on bugfixes and adding more compatibility for input drivers. It comes with the updated version of Simply Love (v5.2.0) which is compatible with this release.

Features
========

Input Drivers
-------------

Since ITGmania is now only a 64-bit application, some input driver support was originally dropped in that transition. This release attempts to reinstate them and add a few more:

*   Added Minimaid support on Windows. You now require the `mmmagic64.dll` file instead of the `mmmagic.dll`. You can find that [here](https://github.com/geefr/libmmmagic/releases/latest). Courtesy of [@geefr](https://github.com/geefr) for creation of the DLL and LEISHEN for helping test.
*   Added PacDrive on Windows. You now require the `pacdrive64.dll` file instead of the `pacdrive32.dll`. You can acquire this DLL from the manufacturer's website [here](http://www.ultimarc.com/PacDriveSDK.zip). Thanks to [@JeffreyATW](https://github.com/JeffreyATW) for testing.
*   We've also introduced support for PacDrive on Linux courtesy of [@jsirex](https://github.com/jsirex) and updated by [@DinsFire64](https://github.com/DinsFire64). For that you can add the following udev rules to:
```
    cat /etc/udev/rules.d/75-linux-pacdrive.rules
    SUBSYSTEM=="usb", ATTRS{idVendor}=="d209", ATTRS{idProduct}=="1505", MODE="0666"
    SUBSYSTEM=="usb", ATTRS{idVendor}=="d209", ATTRS{idProduct}=="1500", MODE="0666"
```

New Features
------------

*   Add a preference for the max number of credits. The limit was previously hardcoded - by [@CrashCringle12](https://github.com/CrashCringle12)
*   Adds new sorting capabilities for Profiles - by [@CrashCringle12](https://github.com/CrashCringle12)
*   Allow PreferredSongs and PreferredCourses to be loaded from absolute paths instead of always from the Theme's Other directory - by [@teejusb](https://github.com/teejusb)
*   (Engine only) Added HyperShuffle implementation (basically a better Blender) - by [@tertu-m](https://github.com/tertu-m)

Bug Fixes/Code Health
---------------------

*   Prevent crashing on bootup due to simfile parsing issues. - by [@teejusb](https://github.com/teejusb)
*   Revert to previous behavior where reloading songs from the operator menu ignores the FastLoad option to always execute a fresh build. - by [@natano](https://github.com/natano)
*   Fix M-mod calculations for split timing - by [@telperion](https://github.com/telperion)
*   Fix bug where scores were being erroneously truncated and lost - by [@CrashCringle12](https://github.com/CrashCringle12)
*   Remove global `using namespace std` - by [@Alhetus](https://github.com/Alhetus)
*   Help set up for better code health treating warnings as errors (reverted, but will be enforced in the future) + require C++17 for building - by [@bphlipot](https://github.com/bphlipot)
*   Miscellaneous fixes/updates - [@natano](https://github.com/natano), [@quietly-turning](https://github.com/quietly-turning), [@zachwalton](https://github.com/zachwalton), [@SheepyChris](https://github.com/SheepyChris)

Installation
============

The installation process has largely not changed but you can still refer to the instructions below.

Windows
-------

The installer for Windows is not signed, so you will have to click through a couple of security dialogs when running it.

[![](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-1.png)](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-1.png)

[![](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-2.png)](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-2.png)

[![](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-3.png)](https://raw.githubusercontent.com/GrooveStats/gslauncher/main/doc/images/win-security-dialog-3.png)

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

Contributors
============

Refer the to the patch notes for the individual contributions in this release.

Thanks to all who contributed to this release!
