---
title: "OpenITG, alpha 1"
---

```
-Revision 21-style song loading support, starting at PlayersFinalized().

-Settable preferences (defaults in parentheses):
    CustomMaxSeconds	- Maximum allowed song length (120 seconds)
    CustomMaxSizeMB	- Maximum allowed song size (5 MB)
    CustomMaxStepSizeKB	- Maximum allowed SM file size (100 KB)
    CustomsLoadMax	- Limit amount of songs loaded (50 songs)
    CustomsLoadTimeout	- Custom song loading timeout (5.00 seconds)
    SongEdits		- Enable/disable custom songs. (0 [false])

-Significant new code functions:
    SCREENMAN->OverlayMessage()	  - message overlay on top of screen
    SCREENMAN->HideOverlayMessage - remove message from screen
    SONGMAN->LoadPlayerSongs()    - loads songs from a player's profile
    (RageUtil) CopyWithProgress() - copy a file while sending progress
				    (fPercent) to a function pointer
```