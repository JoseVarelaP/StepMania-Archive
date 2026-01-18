---
title: "Etterna 0.74.0"
source: "https://github.com/etternagame/etterna/releases/tag/v0.74.0"
---

**\[0.74.0\] - 2024-12-25**
===========================

As always, back up your Save. That includes any personal modifications to the Assets folder, Noteskins folder, and the entire Save folder. These folders are usually found in the folder your game is installed.

If you made modifications to Theme files for your custom windows, you will need to save that specific Lua file as well.

MacOS Note
----------

OpenSSL is required. It can be installed with Homebrew:  
**NOTE:** If you don't have Homebrew installed already, follow [the instructions from the Homebrew website](https://brew.sh/).

brew install openssl

Linux Note
----------

It has come to our attention that newer versions of some distributions like Ubuntu make it difficult to install the required OpenSSL libraries to run the game. If you try to open the game and are hit with an error complaining about `OPENSSL_1_1_1` not found despite following proper instructions to install it, try this:

wget http://archive.ubuntu.com/ubuntu/pool/main/o/openssl/libssl1.1\_1.1.1f-1ubuntu2\_amd64.deb
sudo dpkg -i libssl1.1\_1.1.1f-1ubuntu2\_amd64.deb

We would love it if someone helped upgrade the project to OpenSSL 3.x, which would resolve this and a few other issues.

EtternaOnline
-------------

The primary site for the game, etternaonline.com, has been rewritten and is once again open to the public. For the past several months it has been partially public with an invite code system that required joining the Discord. It has a new pack tagging system which we take advantage of ingame to replace and supplement the old pack bundle system. Pack tags are managed by site staff. The site also has a new search API that will soon allow for online song search from ingame among other things.

All of your scores and accounts on the old EtternaOnline are gone, but the data is backed up somewhere. We will be working on a way to retrieve that eventually. It will be in the form of a system that generates a usable Etterna.xml for you.

Where is 0.73?
--------------

This update is 0.73 except for a tiny handful of things. 0.73 was released privately to site testers.. and then a few thousand people got their hands on it. We decided to release it as 0.74 to prevent issues with update confusion and other internal issues.

* * *

**Changes/Updates**
===================

*   **General**
    *   Online integration has been rewritten
        *   Chart leaderboards will hide invalid scores by default - not just "ccon" scores
        *   Chart leaderboards on the "All Rates" option will sort scores by SSR, Rate, and then Percent
        *   Users must now log in using their email instead of username. The email is censored ingame to allow for this
        *   Pack downloads screens have been redone so that bundles no longer exist and you may now choose tags to filter packs
        *   Pack rankers can use `Ctrl + Shift + O` to cache a pack for ranking. Users can try this out for curiosity to see what happens... it isn't very entertaining
        *   Pack downloads have a warning when they contain NSFW content
        *   Favorites sync automatically
        *   Goals sync automatically
        *   Playlists sync manually
        *   Hovering over the score upload progress bar actually tells you how many scores are in progress
    *   ScreenTextEntry has a new button "Unhide" which uncensors the text if it is censored
    *   Added SortMode "Chart Author" - sorts songs by the `#CREDIT` field
    *   Added SortMode "Date Added" - sorts songs by the date they were added to your local cache.db. This means that if you reset your cache, the Date Added is reset
    *   Added new Max Texture Resolution options `4096` `8192` `Unlimited`
        *   NOTE: These are some of the first truly modern spec-requiring options. Setting these to a higher value can cause excessive RAM or VRAM usage
    *   Added Preference `ForceNoDoubleSetup` to prevent accidentally using double setup in gameplay
        *   This is found in Input Options
        *   It works by only allowing you to press the first binding you ever pressed for a particular column for the entire score
    *   Added Preference `ForceSnapColors` to have the game attempt to force snap colors upon you
        *   This is found in the debug menu `F3 + F8 + W`
        *   It doesn't work well for skins that already have colors added. This is more or less a joke
    *   Added Preference `DisableWindowsKey` to disable the Windows key in gameplay
        *   This is found in Input Options
        *   Only works on Windows
    *   Added Scroll Wheel Debounce, separate from Input Debounce
    *   Added Preference `AllowSongDeletion`
        *   When turned on, you can press `Ctrl + Backspace` to delete a song
    *   Added Preference `FixKeyboardLayout` which will attempt to set your keyboard layout to US standard if you have input issues
    *   Song search supports `ck=` to search by chart key
    *   Song search supports `group=` or `pack=` to search by pack
    *   Target Tracker in Rebirth and Til' Death have a new mode `PB Replay` which allows for live tracking your PB with its replay
    *   Differential Reload (`Ctrl + Q`) now shows how many songs were loaded
    *   `default.xml` or `default.lua` in a chart no longer forces it to be invalid
    *   Debug Menu option that shows the chartkey in the F8 menu will copy the chartkey to your clipboard if you press it
    *   **Hold and Roll life is forced to the J4 window for all judges** (250ms and 500ms respectively)
    *   **Invert is now an invalidating modifier**
    *   **"NegBPM" otherwise known as files with negative BPM or warps are now no longer invalid and invalid scores on these files should rescore themselves**
    *   Practice mode can go to rates 0.05x and 3.0x instead of whatever else it was
    *   Added the current gamemode to a visible location while picking a profile incase you have no idea what you are doing
    *   Made the Profile options screens less incomprehensible and informative when trying to delete a profile
    *   Replays that can't be watched won't start
    *   Replays that aren't existing on disk will never attempt to check the disk again to load them until a game restart
    *   Scores and Replays always save unless you hit 0 notes
        *   If you hit 0 notes, you instantly go back to SelectMusic
    *   Legacy Volume controls now have a resolution of 5% instead of 10%
    *   Changed non-pitched rates algorithm so it sounds better. Sounds cool on very low downrates
        *   Can be turned off with Preference `StepmaniaUnpitchRates=true`
*   **MinaCalc**
    *   Supports non 4-key difficulties, but it is in a mostly broken state
    *   Removed the chaos pmod from Stream, which basically means mashy jiggly wiggly potato finger wiggling streams are worth less relative to other stream files. Overall Stream should be slightly better looking
    *   Reworked Chordjacks to punish a lack of variety on a hand, basically
    *   Probably tiny other adjustments
    *   Some inner changes nobody cares about
    *   Rebirth Calc debug screen added
*   **Rebirth**
    *   Added a WIP Chinese translation
    *   Added a button to invalidate a specific score
    *   Added multiplayer roughly equivalent to Til' Death
    *   Added `.osu` to Help screen
    *   Added a login/logout button to the Profile tab
    *   Asset Settings allows pressing numbers to change tabs
    *   Numpad no longer works to change tabs
    *   Color Config allows pressing up or down to change the hex color by character
    *   Color Config is no longer inconsistent for keyboard users (the colors and text were updating weird)
    *   Goals allow clicking the percent to show you the score
    *   Keybindings screen hides the Player 2 stuff by default, added an option to show the doubles side if applicable
    *   Menu backgrounds now show something instead of nothing
    *   MusicRate hotkeys `-/+` will reset the rate to 1x if you press them at the same time
    *   Realigned the PlayerInfo gameplay text
    *   Removed the gamemode option from the Settings screen
        *   This is probably for your own good. Hopefully we won't ever need it soon...
    *   Scores tab shows "No Song Selected" appropriately
    *   Settings requires you to be hovering exactly on a visible component of a row in order to proc the scroll wheel
    *   Sort Mode menu will start hovering on the current sortmode
    *   Sort Mode menu will return you to the song that was last hovered if possible after selecting a sortmode
    *   Pressing Up/Down to close a folder works more like Til' Death
    *   Reloading a song/pack shows a completion message
    *   Replays can be paused by right clicking
    *   Right clicking will close ScreenTextEntry
    *   Title screen won't hover items if you don't move the mouse
*   **Til' Death**
    *   Added a button to invalidate a specific score
    *   Asset settings allow pressing numbers to change tabs
    *   Eval screen MA counter allows pressing `Shift` or mouse hovering to show RA - do both to show LA
        *   RA is like MA, but for the J7 Marvelous (Ridiculous) to J4 Marvelous
        *   LA is like RA, but for yet another step up
    *   Eval percent color should match the grade even after rescores
    *   Judge difficulty display in the bottom left can be clicked to change
    *   Gameplay leaderboard realignments
    *   General tab immediately shows a goal when it is created
    *   Hovering your play count shows how many plays this session
    *   Hovering your songs loaded shows packs loaded
    *   MusicRate hotkeys `-/+` will reset the rate to 1x if you press them at the same time
    *   Playlists tabs shows your PB on the given rate
    *   Rate text in the general tab can be clicked to change rate like Rebirth
    *   Pressing `Ctrl + F2` will force a switch to the General tab (this prevents a lot of issues trust me)
    *   Replays show the Results and Exit button like Rebirth
    *   Replay scrolling on the full progress bar works like Rebirth
    *   Score tab tells you that you aren't on a chart
    *   Score tab allows uploading a score even if you have no replay data
    *   Score tab rate text can be clicked to change the score selected
    *   Tags tab has instructions for deleting

**Fixes**
=========

*   **General**
    *   Autoplay usage allowed saving scores for some reason
    *   Chord Density Graph now supports below 1.0x rate
    *   Debug menu Open Song Folder button didn't close the debug menu
    *   Noterow timestamp caching when entering gameplay should now take almost no time at all, meaning files with 10 quadrillion noterows have a chance of loading within this millenium (for warp users)
    *   Less breaky prevention of gameplay lua cheats
    *   Asset settings should no longer show zip files
    *   bare-frames coolScroller broke for non 4k
    *   BMS files with 0-length holds no longer crash and are interpreted as single taps
    *   Calc debug used to leak into the regular calc. dont ask
    *   Capitalizing the file extension caused some graphics to not load
    *   Clipboard would permanently break on Windows when pasting non-text
    *   Crash when changing `MusicWheel:NumWheelItems` metric at runtime then reloading
    *   Crash when a file has a 0 bpm
    *   Crash when a file has no taps
    *   Crash when loading an invalid Replay
    *   Crash when freeing a replay that wasn't saved to disk I guess
    *   dance-couples not properly loading NoteData
    *   Downloads in progress shouldn't be able to be queued twice
    *   Downloads stuck at 0kb/s couldn't be cancelled
    *   Favorites being erased by reloading the song
    *   Force Upload buttons doing nothing when there is nothing to upload
    *   Gameplay Leaderboard sorting was unstable
    *   InputData column inconsistency (the worst possible thing to happen)
    *   "Invalid Renderer `opengl`" crashes caused by d3d failure to load
    *   Kb7 default noteskin retrobar-razor\_o2 incorrectly displayed
    *   Loading Window showed impossible percentages
    *   Lua's `IniFile.ReadFile` was broken
    *   Lua vulnerabilities allowing access to user filesystem and executables outside of the game
    *   MaxTextureResolution being set over 2048 didn't actually do anything
    *   Measure line on beat 0 stutters
    *   Mouse clicking outside the game window shouldn't do anything
    *   MusicWheel pack progress coloring was wrong on the first load
    *   Unknown crash in MusicWheel
    *   Negative debounce values
    *   NaN wifepercent in Gameplay/Replay
    *   Hard lock when pressing F2 with negative NumWheelItems
    *   Pack downloads fail less with bad filenames
    *   Permamirror erased when reloading a song
    *   PlayerConfig usages in Noteskins causing hard locks
    *   PlayerConfig usages in Noteskins causing deletion of profile data (lmaooo)
    *   Practice Mode could end up in an impossible state by reverse entering gameplay
    *   ScreenTextEntry and ScreenPrompt input redirection issues probably resolved (softlocks)
    *   Sprites and Quads cropping corners when fading adjacent sides
    *   UIElements had null button roots sometimes for no real good reason
    *   Update button actually shows up when there is an update
*   **Rebirth**
    *   Asset settings images used weird sizes
    *   Create profile dialogue would just always create a profile even if you cancel
    *   Customize Gameplay breaking when using Reverse
    *   Help screen broke when reloading scripts
    *   Lua errors on song failure
    *   Login hotkey should follow the letter L instead of the physical position of the US layout
    *   Multiple profiles in a session caused all gameplay settings to be reset
    *   Pack downloader didn't allow 2gb downloads
    *   Pack downloader showed a negative progress bar
    *   Playlist playback causes the NoteField customizations to double or reset
    *   Playlist/Tag creation softlocks
    *   Reloading scripts breaks everything
    *   Settings menu lag on HDDs
*   **Til' Death**
    *   Chart preview Lua error when hovering nothing
    *   Custom windows and stale numbers or whatever
    *   Download cancel does not cancel download
    *   Evaluation cb counter isn't even counting cbs
    *   Favorite icon appearing too late
    *   Judgment bar fill/count/everything wrong when using custom windows
    *   Gameplay Judgment Lua issues
    *   Lane cover stuck when using CenterPlayer1=off
    *   MA/PA counter wrong when using custom windows
    *   Saturation forced colors to be wrong especially on title screen
    *   Score tab blank when changing difficulties
    *   Search and Downloads breaking or something man i dunno i been writing this for like 2 hours
    *   Tag lua errors I guess
    *   Tag tweens too

**Development**
===============

*   Apple M1 build
*   Apple High Sierra build
*   ALSA sucks 1% less
*   ASIO updated to 1.28.0
*   Base64 image loading implemented but not end-user present
*   clang16 build
*   g++13 build
*   stb updated
*   stb error logging changed
*   Cryptman can get the hash of a binary file
*   DateTime::GetYesterday
*   d3d error logging changed
*   Added env vars to allow remote installs - `ETTERNA_ROOT_DIR` `ETTERNA_ADDITIONAL_ROOT_DIRS` `ETTERNA_ADDITIONAL_SONG_DIRS`
*   MinaCalc defines `STANDALONE_CALC` `PHPCALC`
*   Replays saved from online can be placed in `/Save/OnlineReplays/` (experimental)
*   zlib compression for some DLMAN requests
*   OptionRows play the option change sound after a setting is saved instead of before
*   OptionRows defined in Lua can specify `ExportOnCancel` which will save the option if you press escape to exit
*   Optimized `Platform::getSystem()`
*   Removed some of the direct replay data hooks in HighScore, which you can basically replace with `highscore:GetReplay():GetNoteRowVector()` for example
*   **Lua changes**
    *   Added LuaThreadVariable `CurrentNoteSkin` so you can `Var ("CurrentNoteSkin")` and see the name of the loaded NoteSkin from its own code (which was apparently too hard to do otherwise)
    *   Added `Actor:GetSibling(x)` as an alias to `Actor:GetParent():GetChild(x)`
    *   Added `ActorFrame:GetAllDescendents()` to get a flat list of children recursively
    *   Added `ActorFrame:GetDescendant(...)` as an alias to `ActorFrame:GetChild(x):GetChild(y):...`
    *   Added `BUTTON:RefreshCurrentButtons(screenname)` for reloading BUTTON if a registered button has a lifetime shorter than the Screen's lifetime
    *   Added `BUTTON:MouseHasMoved()` to see if the mouse has moved in the current screen lifetime
    *   Added `BUTTON:WaitForMouseMovement(b)` to toggle the functionality where all buttons do not function if the mouse has not moved on the current screen lifetime
    *   Added `BUTTON:GetTopButton()` to get the topmost button hovered by the cursor right now
    *   Added `NoteField:show_beat_bars(bool)`
    *   Added `NoteField:show_interval_bars(bool)`
    *   Added global constant `MIN_MUSIC_RATE` `MAX_MUSIC_RATE`
    *   Added `INPUTFILTER:GetSecsHeld(x, x)` which works like `INPUTFILTER:IsBeingPressed(x, x)` but gives a length of time instead
    *   Added `Replay:IsLoaded()` to see if a replay has loaded data
    *   Added `Replay:LoadAllData()` to attempt to load all InputData, ReplaysV2, and any other data existing
    *   Added `Replay:GetMissDataVector()`
    *   Added `RoomWheel:GetRooms()`
    *   Added `RoomWheel:MakeNewRoom()`
    *   Added `ScreenGameplay:RestartGameplay()` which allows for Lua access to the RestartGameplay button
    *   Added `ScreenNetRoom:SelectRoom(roomname)` which allows for Lua access to attempt to enter a multi room without using the wheel
    *   Added `Song:OpenSongFolder()`
    *   Added `ms.pp(x)` which works like `ms.ok(x)` but pretty-prints a given table
    *   Added message broadcasts for these events:
        *   `PermamirrorUpdated`
        *   `GoalsUpdated`
        *   `FavoritesUpdated`
        *   `NSMANSelectedSong` when in multiplayer and you are forced to select a song
    *   Renamed message `DisplayAll` to `DisplayAllPlaylists`
    *   Added `table.combine(...)` to combine tables
    *   Added `table.extend(t, t)` to extend a table using the content of another
    *   Added `table.sorted(t, f)` to return a sorted shallow copy of a table
    *   Added `table.withfuncapplied(t, f)` to return a shallow copy of a table with a given function applied to its keys and values