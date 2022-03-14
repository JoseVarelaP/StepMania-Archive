Before starting with this document, it is worth pointing out, iDANCE and iDANCE 2 are **NOT StepMania**.
Those use a completely different engine, which according to sources was chosen due to how "it could render 3D stuff for the backgrounds".

iSTEP is based on StepMania however, specifically being a custom ITG PC build that includes a few changes
such as 4 Player play via Multiplayer Controllers, not Player controllers, Automatic Speed, and others.

iSTEP was a separate game made by Positive Gaming meant to be a simpler, more affordable version of their iDance series of games, where it would only bundle 4 wired pads, control boxes, the software and a security dongle.

![Overview of the pads connected to their control boxes](/SMArchive/Builds/HTMLChangeLog/SM395/iSTEPimg/padsControl.jpg)

It is worth noting that this game requires the security dongle to be plugged in to even boot.

## The Game

![Gameplay screen of iSTEP](/SMArchive/Builds/HTMLChangeLog/SM395/iSTEPimg/gameplay.png)

Gameplay screen. Given the timeframe of the release of iSTEP and iDANCE, the receptors were a no go given Konami's patents.

All of the stages shown on the gameplay screen have been converted into video sequences, given the limitations of StepMania's method of rendering 3D models, being only limited to MilkShape 3D ASCII at this point, so it's only applicable to the NoteSkins themselves.

Judgments are provided by 3 stars, only having Fantastic, Excellents and Greats. Alongside the judgment frame includes the percentage score and the player combo.

![Player Options of iSTEP](/SMArchive/Builds/HTMLChangeLog/SM395/iSTEPimg/playeroptions.png)

Options screen. A few changes are performed here.
By default, Arcade style selection is used, which provides the down arrow to move to the next menu by just pressing start.

The Auto option, is a mod speed option that seems to calculate the speed based on the current difficulty and the song's BPM. Tilt represents the perspective, now only being in numbers (Only Hallway, Overhead and Distant are used).

![Music Wheel of iSTEP](/SMArchive/Builds/HTMLChangeLog/SM395/iSTEPimg/musicwheel.png)

Song Select screen, which is just ScreenSelectMusic, with item graphics. The banners for each song are baked graphics, nothing being made by the engine.

On the right its the difficulty selection, represented by 5 difficulties (No Steps are mines).

![Evaluation of iSTEP](/SMArchive/Builds/HTMLChangeLog/SM395/iSTEPimg/evaluation.png)

Evaluation screen. Really basic screen, only showing your judgments, percentage and max combo.

![Evaluation of iSTEP](/SMArchive/Builds/HTMLChangeLog/SM395/iSTEPimg/multiplayer.png)

This can be described as the main event of this build, the inclusion of an actual functional Multiplayer. This is different from regular 4 player modes like SM3.9 4-Player or SM5-Event where all player logic is processed to every player; instead, the Multiplayer mode only processes timing and score logic to each player, and only has to render 1 to 3 notefields to accomodate the chosen difficulties. This makes it possible to have up to 32 players while still having good enough performance to keep it all up, by just having to draw one notefield that will represent the chart that everyone will play.

Looking through the theme metrics for this build, it seems it has been stripped out to only a theoretical 8 Multiplayers max, while the game only allows up to 4.

Given that this mode requires actual pad input, and does not respond to keyboard input at all to represent a player, the mode has been forced enabled to show the following screens.

The Multiplayer for this build only allows for one difficulty selection for every player, which is represented by the singular highlight selector. The options menu can only be controlled by the first player.

![Select Music with Multiplayer enabled](/SMArchive/Builds/HTMLChangeLog/SM395/iSTEPimg/selectmusicMult.png)

The gameplay screen for the Multiplayer mode is almost the same as the regular one, however the main difference here is the notefield, being a dummy, which just plays the chart. Scores for each player are shown above the screen to showcase how well they're doing.

![Multiplayer play](/SMArchive/Builds/HTMLChangeLog/SM395/iSTEPimg/GameplayMult.png)

However, given the brute force entry to get to this screen, no actual multiplayer has joined, so no scores are shown at all. Here's a screenshot from the [gameplay trailer](https://www.youtube.com/watch?v=1PhgSzwbEPE) that showcases how it looks in action (There was an uncompressed screenshot on the website before hand, but it never managed to get archived).

![iSTEP's Multiplayer mode from its preview video](/SMArchive/Builds/HTMLChangeLog/SM395/iSTEPimg/GameplayVideo.jpeg)

## Technical overview

***Note: I am unaware if there are any other versions of iSTEP aside from the one described in this article (iSTEP 1.0 - Oct 09 18:57:19 2012 (build 1261)).***

While being based on ITG PC's code, a mayor difference here is that the game data is not loaded with a locked VFS unlike ITGPC, which allows for custom data to be loaded no problem like regular StepMania.

Certain Lua commands have been removed, likely as they saw no use for them, like `GAMESTATE:GetMusicLengthSeconds()`, which used by a lot of modfiles, resulting in crashes upon loading unless changed with a different value.