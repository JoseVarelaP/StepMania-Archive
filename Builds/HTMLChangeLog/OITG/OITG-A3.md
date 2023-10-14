---
title: "OpenITG, alpha 3"
---

```
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