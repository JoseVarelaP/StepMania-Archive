---
title: "ITGmania v0.8.0"
source: "https://github.com/itgmania/itgmania/releases/tag/v0.8.0"
---

About
=====

This is the v0.8.0 release of ITGmania. This release has a lot of quality of life changes but is also required for the latest version of Simply Love for ITGmania (v5.4.0)

Features
========

Borderless Fullscreen for Windows
---------------------------------

Courtesy of [@glitchybear](https://github.com/glitchybear). You might want to add `IgnoredDialogs=FRAME_DIMENSIONS_WARNING` to your Prefrences.ini to prevent a common dialog that might take away input from the game.

New Songwheel Sorting Methods
-----------------------------

A new sorting method has been added to allow sorting the song wheel by the block difficulty of all charts, agnostic of the "slot" they occupy.

For example, under the new method, a simfile with an Expert chart rated 10 and a different simfile with an Easy chart rated 10 will both appear under the "10" folder.

This behavior is similar to Difficulty sorting in other popular rhythm games, such as Sound Voltex and modern DanceDanceRevolution mixes.

In addition, the ability to sort the songwheel by Top Grades on a per-profile basis has been added.

FA+ Blue/White flashes
----------------------

The NoteSkins have been updated to support a white flash to differentiate between Fantastic and Fantastic+ judgments. Use this alongside the latest Simply Love as it supports these sets of NoteSkins.

Add Support For Beat Bars
-------------------------

These are the measure lines similar in DDR. Can be set per player.

New #SONGSELECT Tag for Course Mode.
------------------------------------

Courtesy of [@mjvotaw](https://github.com/mjvotaw). This allows for greater flexibility in the what songs can be defined for course mode. See `Docs/CourseFormat.txt` for usage.

Other Additions
---------------

*   Added support for LR-Mirror and UD-Mirror
*   Cabinet lighting behavior has been improved, and functionality to simplify the bass lighting behavior has been added.
*   Missing sort functionality for GRADEBEST and GRADEWORST cases in the CourseWriterCRS has been added.
*   When using a new Memory Card, a Songs folder will now automatically be created.
*   Allow specifying an order for input devices in Linux. This can be done via the InputDeviceOrder preference.

Bug Fixes
=========

*   Fixed an issue with the tomcrypt workaround from [#107](https://github.com/itgmania/itgmania/issues/107) being non-functional on Linux builds.
*   Fixes a visual error with the Enchantment NoteSkin, which resulted in "wiggling" receptors during gameplay.
*   Fixed an error with high score lists that would cause multiple high scores to display for a single player when merging score lists.
*   Fixed a bug that caused the music wheel to behave incorrectly if a song was placed in multiple sections when using Preferred sort.
*   Fixed a bug that would cause crashes if a song had time signatures defined, but did not include time signature data on Beat 0.

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

You also currently will require an older version of libusb to be installed to the system.

On a debian based install (ubuntu, mint, etc.) you can run `sudo apt-get install libusb-0.1-4`  
For arch based installs, you can `run sudo pacman -S libusb-compat`

Switching from StepMania 5.1 (or StepMania 5.0.12)
--------------------------------------------------

Check out the [StepMania 5.1 to ITGmania Migration Guide](https://github.com/itgmania/itgmania/blob/beta/Docs/Userdocs/sm5_migration.md).

* * *

Contributors
============

[@teejusb](https://github.com/teejusb) - Primary Contributor!  
[@aeubanks](https://github.com/aeubanks) - Fixing an issue with the tomcrypt workaround not being functional on Linux builds  
[@x0rbl](https://github.com/x0rbl) - Fixing some Groove Radar calculations  
[@quietly-turning](https://github.com/quietly-turning) - Fixed a visual error with the Enchantment noteskin, which resulted in "wiggling" receptors during gameplay  
[@CrashCringle12](https://github.com/CrashCringle12) - Fixed an error with high score lists that would cause multiple highscores to display for a single player when merging score lists. Added per-profile sorting for Top Grades.  
Fixed a bug that caused the music wheel to behave incorrectly if a song was placed in multiple sections when using Preferred sort. Added the ability to sort the song wheel by block level  
of all charts in all difficulty slots.  
[@DinsFire64](https://github.com/DinsFire64) - Improved cabinet lighting behavior and performance in gameplay  
[@ScottBrenner](https://github.com/ScottBrenner) - Improved Actions per Checkout  
[@48productions](https://github.com/48productions) - Added functionality to automatically create a Songs folder on Memory Cards  
[@mjvotaw](https://github.com/mjvotaw) - Added missing GRADEBEST and GRADEWORST cases for CourseWriterCRS. Fixed a bug that would cause crashes if a song had time signatures defined, but did not include time signature data on Beat 0  
[@SugoiFactory](https://github.com/SugoiFactory) - Added FA+ style blue/white flashes support for all default noteskins  
[@sergioperez](https://github.com/sergioperez) - Added LinuxInputJoysticks (renamed to InputDeviceOrder) to Preferences.ini to ensure pad order consistency  
[@tertu-m](https://github.com/tertu-m) - Added functionality to set and get Beat Bar Status per Notefield from Lua

* * *

Change Summary
--------------

Thanks to all who contributed to this release!

For a full summary of changes between v0.8.0 and v0.7.0, check [GitHub's comparison of the two](https://github.com/itgmania/itgmania/compare/0.7.0...0.8.0).