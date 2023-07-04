---
title: "ITGmania v0.7.0"
source: "https://github.com/itgmania/itgmania/releases/tag/v0.7.0"
---

About
=====

This is the v0.7.0 release of ITGmania. This release mostly focuses on introducing the changes to the engine to have better behavior for handling early timing window triggers. See below for a description.

Features
========

Better Handling for Early Triggers
----------------------------------

This is similar to IIDX's Early Poor Judgment

(Speaking in ITG terms)

The high level proposal is to always keep the decent/way offs on. This engine change modifies early hits for those windows such that you will still incur the life bar hit as intended on those judgments, but you will now have the ability to still hit the arrow again for score. This also completely eliminates way off towers. In general, the feedback has been that it feels basically the same for tech and boys on stamina feels a bit easier because no way off towers.

### Detailed Explanation

By default, greats and higher are considered "good" judgments (as you'd expect).

If you get an early decent or way off, your life bar gets hit accordingly, but the arrow is still hittable. If you then get a good judgment on the same arrow, that judgment is finalized and you can't hit it again. In that case, your life bar doesn't get modified since it already was earlier.

If you don't hit the arrow again, the judgment gets finalized as whatever the early judgment was (decent or way off). That's when it'll show up in your judgment counts.

If you get a late decent or way off, then there is no change to the behavior. There is also no change in behavior for jumps.

It mitigates way off towers because the current arrow is still hittable, where prior to this change the next arrow would instead be overlapping with the current arrow which would've already been judged.

Bug Fixes/Code Health
---------------------

* Fix the V-Sync bug on Windows that was inadvertently introduced in the last release. Your FPS should be better now if you enable V-Sync.
* Fix macOS builds on the latest version of Ventura (thanks [@bkirz](https://github.com/bkirz) !)
* Some code health fixes courtesy of [@natano](https://github.com/natano)

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

```shell
xattr -dr com.apple.quarantine /Applications/ITGmania
```

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

* * *

Change Summary
--------------

Thanks to all who contributed to this release!

For a full summary of changes between v0.7.0 and v0.6.1, check [GitHub's comparison of the two](https://github.com/itgmania/itgmania/compare/0.6.1...0.7.0).