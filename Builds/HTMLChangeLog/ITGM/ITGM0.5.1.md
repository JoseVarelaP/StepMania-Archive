---
title: "ITGmania v0.5.1"
---

About
=====

ITGmania is a fork of StepMania 5.1 providing built-in networking functionality and other new features. It comes bundled with the most recent Simply Love, a selection of NoteSkins, as well as Club Fantastic S1 and S2 for the song selection.

The included Simply Love removes the need for the [GrooveStats Launcher](https://github.com/GrooveStats/gslauncher/). It has complete feature parity with the launcher as all the features are built into the game/theme itself. While the GrooveStats Launcher is not required for ITGmania, it can still be used with themes that still rely on it such as Waterfall and Digital Dance.

Features
========

Built-in networking (no GrooveStats Launcher required with a supported theme)
-----------------------------------------------------------------------------

ITGmania supports auto-downloading Stamina RPG 6 unlocks. This release has an in-game downloads viewer to check the progress of any downloads during your game session.

[![ViewDownloads](https://user-images.githubusercontent.com/5017202/173255997-d0be6c2b-4153-4c64-abb9-a8214fefdea1.png)](https://user-images.githubusercontent.com/5017202/173255997-d0be6c2b-4153-4c64-abb9-a8214fefdea1.png)

Load New Songs From Song Select
-------------------------------

This feature is useful for Stamina RPG unlocks as well as when wanting to add song packs mid-session. Note that this only loads new songs and doesn't reload deleted/modified songs. As a result, the game loads the new songs _really fast_.

[![SSMReloadSongs](https://user-images.githubusercontent.com/5017202/173255878-35bc23d3-c79c-46bd-9e0c-8ee318391280.png)](https://user-images.githubusercontent.com/5017202/173255878-35bc23d3-c79c-46bd-9e0c-8ee318391280.png)

Fast Profile Switching From Song Select
---------------------------------------

Quickly change profiles without needing to back out to the title menu from within the song wheel. This also helps in unjoining a player if they were accidentally joined.

[![SSMProfileSwitch](https://user-images.githubusercontent.com/5017202/173255964-3de42ad5-1cc3-4361-8599-4b583f76edba.png)](https://user-images.githubusercontent.com/5017202/173255964-3de42ad5-1cc3-4361-8599-4b583f76edba.png)

Bug Fixes/Other
---------------

*   StepMania 5 Mine fix applied (courtesy of [@DinsFire64](https://github.com/DinsFire64))
*   Held misses tracked in the engine for pad debugging
*   Fixed overlapping hold bug
*   Player-specific Visual Delay option
*   Player-specific option to disable timing windows
*   Supports both pitch dependent and independent rate mod options

Installation
============

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

Linux
-----

Unpack the tarball to your desired location.

Switching from StepMania 5.1 (or StepMania 5.0.12)
--------------------------------------------------

Check out the [StepMania 5.1 to ITGmania Migration Guide](https://github.com/itgmania/itgmania/blob/beta/Docs/Userdocs/sm5_migration.md).

* * *

Contributors
============

ITGmania Team

*   [@natano](https://github.com/natano) & [@teejusb](https://github.com/teejusb) - We made this for you!

Other Contributors

*   [Club Fantastic](https://wiki.clubfantastic.dance/en/Credits)
*   [@DinsFire64](https://github.com/DinsFire64) - [Mine Fix](https://gist.github.com/DinsFire64/4a3f763cd3033afd55a176980b32a3b5)
*   [EvocaitArt](https://twitter.com/EvocaitArt) - Enchantment NoteSkin
*   [@jenxness](https://github.com/jenxness) - Supporting fast profile switching
*   [LightningXCE](https://twitter.com/lightningxce) - Cyber NoteSkin
*   [MegaSphere](https://github.com/Pete-Lawrence/Peters-Noteskins) - DDR Note/Rainbow/Vivid NoteSkins
*   [StepMania 5](https://github.com/itgmania/itgmania/blob/v0.5.1/Docs/credits_SM5.txt)
*   [Old StepMania Team](https://github.com/itgmania/itgmania/blob/v0.5.1/Docs/credits_old_Stepmania_Team.txt) - Docs/credits\_old\_Stepmania\_Team.txt

Thanks to all who contributed to this release!
