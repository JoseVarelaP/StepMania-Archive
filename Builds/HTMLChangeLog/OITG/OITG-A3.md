---
title: "OpenITG, alpha 3"
---

```
OpenITG, alpha 3 (March 17th, 2008)
-----------------------------------

Phew, it's been a while, hasn't it? Rest assured that the extra time was spent productively. :)
I gained two team members (infamouspat, matt1360) and matt set up an SVN server for us, so an
amazing amount of work has been done in the past ~2 months. There's a lot of new stuff - enjoy!

Please note that this build will reboot if it crashes. I never thought to include a
preference for it, but you can prevent it for now with "touch /tmp/no-crash-reboot".
Alpha 4 will have a "RebootOnCrash" preference (for PC builds only).

Patch support is fully implemented, and the Patch.rsa files are included for both ITG2 and
future OpenITG patches. Patches of either type will work on OpenITG.

Also, please note that an experimental arcade build is available. ITGIO is untested, and PIUIO
input is borked, but the binary should at least run on arcade cabinets. You'll need a few more
libraries, but I'm honestly not sure which. Please track them down and get back to me.

You can compile arcade builds using config.h's "ITG_ARCADE" directive. configure should have a
switch [--enable-itg-arcade], but it's been kind of spotty for me.


-Mapping changes:
    Added PIUIO/IOW default mappings
    Added default keyboard maps for Select (P1 = right Shift, P2 = numpad 0)
-PrefsManager changes:
    Removed "BrokenBGs" - binary plays BG scripts from all songs now
    Added "DebugUSBInput" - output raw and formatted USB data to console
    Backported "VisualDelaySeconds" on request
-Fixed bugs:
    Start sound doesn't play when course is selected
    Potential memory leak (minor) on SongManager array
-New Screens:
    ScreenArcadeStart (unfinished/not implemented in the Makefiles)
    ScreenArcadeDiagnostics - installation and diagnostic information
    ScreenArcadePatch - update the game through USB patches
-New data types:
    USBDevice - a basic structure for reading USB hardware data
    USBDriver - an abstracted USB I/O driver based off of libusb
    ITGIO - a USBDriver specialised for ITG-IO JAMMA kits
    PIUIO - a USBDriver specialised for ITG2 dedicated cabinet I/O boards
-New LightsDriver:
    External ("ext") - makes light data globally available for other drivers
-New InputHandlers:
    Linux_PIUIO ("piuio") - partially functional, not very usable
    Linux_Iow ("iow") - untested, should be fully functional
-New RageFileDrivers:
    RFDCrypt - handles AES-encrypted .zip files
    RFDPatch - handles AES-encrypted patches
-New USB profile features:
    Choose to save Catalog files ("UseCatalogXML") - default off
-New licensed code:
    -AES encryption/decryption schemes, by Brian Gladman
    -Public domain iButton SDK from Maxim IC
-New project files:
    Patch-OpenITG.rsa - a new Patch verification sig for future OpenITG .bxr patches
```