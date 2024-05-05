## 0.4.5

**Summary**

- Apparatus light and Lamp light now turn off when on the ship (Commit ref: f90bfd6838)
- Added a new Enemy called Locker (Commit ref: eed2eb093e)
- Allowed more scrap to spawn once quota reaches 1k (Commit ref: fb90a4e061)
- Fixed walkies not working (Commit ref: 8621b74117)
- Added Windows and space scene to ship in orbit (Commit ref: 848e7feacd)
- Visor now reacts to environment (Commit ref: 0bdd9b9e40)
- Added forest giant variants (Commit ref: e18a87db8a)
- Logo shows up on Main screen (Commit ref: cd99f9494f)
- Keys can now lock doors (Commit ref: 4671af730d)
- 1 new reserved Slot (Commit ref: 4671af730d)
- Improved overall performance (Commit ref: f78da7b234)
- 3 New moons (Commit ref: 2e36848f74)
- You can now carry 5 items (Commit ref: aa981f6401)
- Turrets can now shoot missiles (Commit ref: aa981f6401)
- LethalConfig is back (Commit ref: e06cd1bf42)
- EmployeeAssignments are back! (Commit ref: 118912167a)

**Performance**

- Logging is now moved to it's own thread
- Lowered Shadow Quality (2048 -> 256)
- Disabled Post Processing
- Disabled Resolution fix
- Startup times improved (1 Minute, 21 Seconds -> 29 Seconds)

**Features**

- Added

    - Locker (ENEMY)
    - LightsOut (PERF)
    - BetterDynamicScrapsAmount (QOL)
    - ShipWindows (FUN)
    - LethalSnap (FUN)
    - ImmersiveVisor (ADD)
    - EladsHud (QOL)
    - TerminalConflictFix (BUG)
    - GiantSpecimens (ENEMY)
    - AsyncLoggers (PERF)
    - Emblem (FUN)
    - KeysLockDoors (FUN)
    - HotbarPlus (QOL)
    - MissileTurret (ENEMY)
    - NutcrackerFixes (PERF)
    - EchoReach (MOON)
    - Harloth (MOON)
    - Maritopia (MOON)
    - SpaceShipDoor (FUN)
    - CSync (DEP)
    - BepInExFasterLoadAssetBundlesPatcher (PERF)
    - LethalConfig (QOL)
    - EmployeeAssignments (ADD)
    - EmployeeAssignmentsUpdaterFix (BUG)

**Changes**

- Updated Mods

    - SirenHead
    - TooManyEmotes
    - HandheldMap
    - FacelessStalker
    - Arachnophilia
    - RandomCosmetics
    - LCOffice
    - LategameUpgrades
    - IntroTweaks
    - LethalLib
    - ShipLootPlus
    - FriendPatches
    - Mirage
    - PoolRooms
    - LethalThings
    - ReservedSlotCore
    - ReservedFlashlightSlot
    - ReservedWalkieSlot

- Removed Mods

    - FrequencyWalkie
    - InfiniteShotgunReload
    - ShowAmmoCount
    - 71Gordion
    - CustomPostProcessingAPI (WHY IS THIS STILL HERE)
    - LethalExpansionCore
    - ImmersiveScrap
    - Druggie
    - Kast
    - SecretLabs
    - ScannableTools
    - SmartItemSaving

- Configs

    - Lowered BaseRarity for PoolRooms (50 -> 20)
    - Halt will now be force spawned to a long hallway (Commit ref: 8c10550a97)

- Lethal-Utility

    - Removes PoloroidPictures directory

## 0.4.4

**Summary**

- Added Blackjack to Casino (Commit ref: dc634ad88e)
- Fixed bugs related to Mirage (Commit ref: d09514052b)
- Fixed issues with saves (Item rotation and positioning) (Commit ref: dc634ad88e)
- Hopefully fixed desyncing with custom interiors (Commit ref: 02b327d8d9)
- Removed LethalConfig until it starts working again (Commit ref: 2f3a0fc196)
- Some emotes now have music/audio (Commit ref: b9b6f09bf7)
- Removed ControlCompanyDetector because it was giving too much vanilla info (Commit ref: 58e9d5fed8)
- Fixed issues regarding late players joining as unknown (Commit ref: 1d9ab4b351)

**Features**

- Added:

    - SmartItemSaving (QOL)
    - ScannableTools (QOL)
    - Halt (ENEMY) (From DOORS)
    - StarlancerAIFix (DEP)
    - 71Gordion (MOON)
    - FacelessStalker (ENEMY)
    - FriendPatches (BUG)
    - SirenHead (ENEMY)

- Rotations:

    - Rotated Cosmetics
    - Rotated Music
    - Rotated Suits

**Changes**

- Updated Mods

    - Arachnophilia
    - OpenBodyCams
    - ItemClippingFix
    - LCOffice
    - PoolRooms
    - HandHeldMap
    - LethalCasino
    - Mirage
    - Coroner
    - BuyableShotgun
    - BuyableShotgunShells
    - TooManyEmotes

- Removed Mods

    - WeatherTweaks
    - PigeonsCosmetics
    - BensCosmetics
    - VooDoo
    - LethalConfig
    - InsomniaxCosmetics
    - NintendoHats
    - LCCutscene (How was this still here)
    - ControlCompanyDetector

- Configs

    - Fixed timings for Mirage, should stop voice lines happening too often. (Commit ref: d09514052b)
    - Lowered PoolRooms chances, should fix it being selected too often. (Commit ref: 5a188ee892)
    - Fixed Nightvision goggles not toggling with N (Commit ref: 58649b042e)
    - Increased Credit Increment for additional players (Commit ref: 8914e21643)
    - Decreased distance for Bracken to jam Walkies (Commit ref: 0eda24664d)
    - Decreased Volumetric Fog Quality to 0 (Commit ref: c5d48f1125)

## 0.4.3

**Summary**

- Added ControlCompanyDetector which gives you an in-game warning when a lobby host is using Control Company.
- Added new enemies
- Walkie-Talkies now have frequencies
- Removed Skinwalker mod and replaced it with Mirage (Syncs audio clips across players)
- Temporarily removed Backrooms until bugs are addressed

**Features**

- Added: 

    - CoilHeadStare (ADD)
    - ControlCompanyDetector (QOL)
    - FrequencyWalkie (QOL)
    - CustomPostProcessingAPI (DEP)
    - LCCutscene (DEP)
    - Voodoo (ENEMY)
    - Mirage (HAZARD)
    - BarchLib (DEP)
    - NAudio (DEP)
    - UniTask (DEP)

**Fixes**

- Fixed the issue with Corporate Restructure causing the emote camera to appear outside the ship
- Fixed freezing issues
- Fixed installers copying files to desktop
- Fixed NoiseSuppression causing bad mic audio

**Changes**

- Updated Mods

    - LateGameUpgrades
    - PoolRooms
    - TooManyEmotes
    - LCOffice
    - OpenBodyCams
    - LethalCasino
    - Diversity
    - ShipLootPlus
    - WeatherTweaks
    - Arachnophilia
    - ImmersiveScraps


- Removed:

    - CustomSounds
    - LCSoundTool
    - CarpetSounds
    - Skinwalkers
    - Removed Diversity
    - Removed Backrooms
    - Removed NoiseSuppression

- Lethal-Utility

    - You can now select specific versions to install

## 0.4.2

**Features**

- Added:

    - PoolRooms (Interior)
    - VarietyMod (Interior)
    - TooManySuits (QOL)
    - Backrooms (Hazard)
    - Backrooms Carpet Sound (ADD)
    - LCSoundTool (DEP)
    - CustomSounds (DEP)
    - BensCosmetics (COS)

**Fixes**

- Fixed scrap disappearing after save reload

**Changes**

- Updated Mods

    - WeatherTweaks
    - TooManyEmotes
    - TheFiend
    - LethalCasino
    - BetterLobbies
    - EmergencyDice
    - OpenBodyCams
    - RollingGiant
    - LCMaxSoundsFix
    - MysteryDice
    - PigeonsCosmetics

- Updated Interiors

    - LCOffice
    - SCPFoundationDungeon

- Removed:

    - BetterSaves
    - SaveStealer
    - PerformanceEnhancer

**Configs**

- Shy Guy spawn chance raised (20 -> 30)

- Sewer and Castle chance lowered (300 -> 150)

- Masked Entities will now show fake usernames

- Turrets no longer target the following monsters:

    - Shrimp
    - RollingGiant
    - SCP 096
    - TheFiend

- Disabled all Turret, Mine, and Boomba interactions for Peepers to hopefully save some performance with AI logic

- Reduced Peeper weight (10lbs -> 5lbs)

- Increased Shrimp spawn weight

    - Rend = 10
    - Dine = 20
    - Titan = 30
    - Custom Moons = 30

## 0.4.1

**Changes**

- Kast should now show up on DRP (Hopefully)

- Updated Some mods (LCOffice, ShipLootPlus, IntroTweaks, MirrorDecor, EmergencyDice, MoreCompany, LethalLevelLoader, Mimics)

- Removed FogRemover

- Added ModelReplacementAPI

- Removed 2 Interiors (Sewer and Dungeon)

- Hopefully fixed an issue where footsteps and other sounds would disappear

- Updated Mod Configs

- Tweaked Shadow quality

- Removed MinecraftScrap

- Removed Lightsabers

- Fix flashlights

- Fixed Minimum deadline being 2 days instead of 3

- Fixed Start credits not scaling how they used to

- Removed Kyrial

- Removed SpaceShipDoor

- Removed ExplodingPresents

- Removed Backrooms

**Features**

- New Monsters!

    - Peepers (ENEMY)
    - Fiend (ENEMY)

- Reworked Spiders (ADD)

- Added handheld map (QOL)

- Better After game performance results (QOL)

- Master Chief Suit (FUN)

- New Bodycams! (QOL)

- New Weather System (ADD)

- Noise suppression! (BUGFIX)

- Bracken will now jam Walkies when within a certain range (HAZARD)

- Overhauled saves and allowed for copying saves when not the host (QOL)

- New Cosmetics (FUN)

- You can now infinity reload the shotgun and see it's capacity (QOL)

- All new Gambling located at the company building! (FUN)

- SCP Moon (MOON)

## 0.4.0.1

**Changes**

- Removed CullFactory

## 0.4.0

**Changes**

- Updated TooManyEmotes

- Updated ReservedCore Mods

- Updated Buyable Shotgun & Shells

- Updated ImmersiveScraps

- Removed Bodycams

- Added LethalLevelLoader

- Added LethalNetworkAPI

- Added OdinSerializer

- Updated ExplosivePresents (New Dev)

- Updated FairAI

- Updated LethalLib

- Updated ShipLootPlus

- Updated PathFindingLagFix

- Updated ReservedCore

- Added CullFactory

- Added FogRemover

- Added HDLethalCompany

- Updated LateCompany

- Updated MaskedEnemyOverhaul

**Features**

- Added Lobby Codes (QOL)

- Added New Monsters!

    - SCP 096 (ENEMY)
    - Shrimp (ENEMY)

- Added new Dungeons (INTERIOR)

- RollingGiant can now spawn on all moons (BUGFIX)

- Added Emergency Dice (HAZARD)

- Added Possessed Masks (HAZARD)

- Skip the launch options! (QOL)

## 0.3.7

**Changes**

- Updated Gambling

- Replaced ShipLoot with ShipLootPlus

- Updated FairAI

- Updated MoreCompany

- ScalingCredits swapped to new dev

- Lowered Gambling Machine count (3 -> 2)

**Features**

- Added Lightsaber Weapons

- New Monster! (Rolling Giant)

- New Custom Moon! (Kyrial)

- Added PerformanceEnhancer

- New Scrap!

## 0.3.6

**Changes**

- Lowered amount of custom moons

- Removed Crosshair

- Re-Added TooManyEmotes

- Updated LethalLib

- Updated NintendoHats

- Updated LategameUpgrades

- Added PathfindingLagFix

- Removed MaskedAIRevamp

- Removed LethalNetworkAPI

- Removed Acidir, Infernis (Moons)

- Updated MaskedEnemyRework

- Changed Plugin folder structure

- Removed CoilHeadStare

- Removed Landminefix (no longer needed)

- Removed NuclearLib

- Removed CompatibilityChecker (Deprecated)

- Updated LethalExpansion

**Features**

- Fixed FPS Issues (Hopefully)

- Re-did plugins folder

- Hopefully fixed an issue starting/joining multiplayer sessions

## 0.3.5

**Changes**

- Re-added ReservedCore Mods

- Updated TooManyEmotes

- Updated LethalNetworkAPI

- Updated MoreEmotes

- Updated BuyableShotgunShells & BuyableShotgun

- Updated LethalLib

- Updated Skinwalkers

- Updated Gambling

- Updated LethalExpansion

- Updated MaskedEnemyOverhaul

- Rotated 2 moons (Ducky, TheEnd) -> (Infernis, Acidir)

- Re-added LethalThings

- Updated InsomniaxCosmetics

- Replaced Fly -> Paranoid (Music)

- Added Music Pack Scripts

- Added ObjectVolumeController

- Updated Nintendo Hats

- Updated MinecraftScraps

- Updated LateGameUpgrades

- Removed TreysHealthText

- Removed TooManyEmotes (Temporary)

- Removed misc mods (SpringManWeightFix, Symbiosis, Neofetch, ModManager, ExtraDaysToDeadline, EmployeeAssignments, YippeeScrap)

- Updated YieldDmgTweak

**Features**

- 2 New Moons (Infernis, Acidir)

- 11 New Cosmetics

- Added ObjectVolumeController (Allows adjusting the volume on media objects)

- Original Metal Recharging is back!

## 0.3.4

**Changes**

- Updated Diversity

- Updated Gambling

- Removed TermSpeak

- Remove UnlimitedPaint

- Remove MoreHead (Forgot to delete this)

- Update LethalExpansion

- Update MoreEmotes

- Added RuntimeNetcodePatcher

- Updated MinecraftScrap

- Updated MinecraftMoon

- Removed PossessedMask (Hopefully fixes issue with being bugged out by masks)

- Update Starlancer

- Removed Installer Script from files

- Removed LethalThings (Temporary)

- Updated LethalLib

**Features**

- Re-added GroanTubeScrap

- Re-added MoreEmotes (New Emotes)

## 0.3.3

**Changes**

- Fixed all emotes not showing up

- Updated TooManyEmotes

- Players can no longer gain conditions (Blindness, Broken leg/arm, ect)

- Brackens anger time reduced from 90s -> 60s

- Remove LethalLanFix (Fixes multiple hosting/joining issues)

- Updated SpaceShipDoor

- Remove GroanTubeScrap (No evidence it's been working)

- Rotated Music

- Moon Rotation (Nintendo Castle, Taiga, Secret Labs) -> (Minecraft End, Starlancer, Atlas Abyss)

- Added ShipLobby

- Updated Skinwalkers

- Replace LandminesForAll with FairAI

- Updated ExtraDaysToDeadline

- Added LethalConfig

- Updated LethalEscape

- Added MaskedAIRevamp (Unstable, may cause bugs)

- Updated MaskedEnemyRework

- Added LCMaskedFix (Fixes mimic / masked bug where you can't look around after the kill is interrupted)

- Updated LethalExpansion

- Updated GamblingMachine

- Updated CorporateRestructure

- Updated LethalAPITerminal

- Updated Mimics

- Updated MoreCompany

- Updated Neofetch

- Updated Diversity

- Added ItemClippingFix

- Removed MoreEmotes

**Features**

- Some Monsters can now trigger turrets and landmines

- Added Crosshair

- Added Mirror Decor

- Masked Players can now use Shotguns and Shovels/Signs

- Masked Players can now call fake dropships

- Masked Players can now steal scrap and hide it

- Moon Rotation

- Music Rotation

## 0.3.2

**Changes**

- Update SCPSecretLabs Moon

- Update LandMineFix

- Remove MaskTheDead (Shouldn't have been there)

- Update Mimics

- Increased Smiler count to 3

- Masks will no longer force you to drop 2 handed items

- Baboon Hawk can no longer mimic players

- Spiders can now mimic players

- The Coilhead can now escape

- Jetpacks are no longer dropped upon teleport

- Items no longer lose charge when being teleported

**Features**

- Masked Enemies can now emote

- Added YipeeScrap

- Add ModManager

- Re-added TooManyEmotes (PLEASE WORK)

## 0.3.1

**Changes**

- Update MaskedEnemyOverhaul

- Removed DimmingFlashLights

- Re-add Diversity

- Removed ReservedCore Mods (Fixes Desync and other bugs)

- Added NintendoHatCosmetics

- Added SpaceShipDoor

- Added ExtraDaysToDeadline

- Updated GamblingMachine (Fixes spam gambling)

**Features**

- The Bracken will flicker and turn off all nearby lights and will dim player's flashlights if they're close to the him.

- Trying to forcibly turn back on the lights with the breaker box could cause the Bracken to be angered for a while and shut off all power permanently.

- You can now open the spaceship door when in space! (It won't kill you)

- You can now use credits to purchase an extra day for your deadline

## 0.3.0

- Overhaul Scripts again

- Remove HexiBetterShotgun

- Update ReservedCoreMods (SprayPaint, WeaponSlot)

- Update Kast Moon

- Updated LethalExpansion

- Updated ChristmasVillage (Now Seperate Mod)

- Update SCPSecretLabs Moon

- Update NoSellLimit

- Remove ReservedFlashlightSlot (Fixes Desync issues)

- Update ReservedCore

## 0.2.9

- Removed FrostyCosmetics

- Removed HexasCosmetics

- Updated InsomniaxCosmetics

- *Hopefully* fixed an issue with people unable to see cosmetics

- Updated ReservedCoreMods

- Update Symbiosis and NuclearLib (Fixed the vanilla bug that hoarding bugs do not drop items upon death.)

- Update Beta-Installer

- Update SCPSecretLabs Moon

- Add Creator Music Pack

- Remove IndieGameScrap (Fixes Scroll/Interact bug when picking up items)

- Remove LateCompany (Fixes various Desync issues)

- Updated Solo's Bodycams

- Added PermanentLadder

## 0.2.8

- Added LandminesForAll (Monsters now trigger Landmines)

- Removed TooManyEmotes (Probably for awhile)

- Beta-Branch Install Scripts

- GroanTubeScrap

- SCP SecretLabs Moon!

- Updated LethalExpansion

- Updating GamblingMachine

- Added LategameUpgrades

- Updated ReservedSlot Mods

- Added IndieGameScrap

- Drop Exploding Presents chance from 20% -> 10%

- The following monsters no longer mimic player voices: "Jester, Thumper, Ghost Girl, Eyeless Dog"

## 0.2.7

- Updated DiscountAlert

- Fix normal install script

- Updated ReservedSlotCore

- Added more scrap

- Added ShowCapacity (Displays remaining capacity of paint spray and TZP)

- No longer requires 3 scrap in inventory to drop a mask

- Remove MoreEmotes and add TooManyEmotes Back

- Add 2 new suits (Rotated out Glow suit and Spacepajama)

- Fixed LethalExtended Logo on LE Suit

- Rotate Songs

## 0.2.6

- NutCrackers can now Escape

- Updated ReservedCore Mods (Flashlight, Walkie, Spraypaint)

- Update MinecraftLoot

- Removed TooManyEmotes (It was causing TOOManyProblems) get it?

## 0.2.5

- Updated Backrooms

- Updated Latecompany

- Updated LethalExpansion

- Added 3 new maps (Castle Grounds, Christmas Village, Taiga)

- Updated TooManyEmotes

- Removed SCPDunGen

- Changed Emotes Keybind to `C`

- Time now shows in the ship

- Adding Gambling Machine at the company (For that last ditch attempt to make quota)

- Installing or updating will now copy the auto update script to your desktop so you don't have to hunt for it!

## 0.2.4

- Updated Backrooms

- Updated CorporateRestructure

- Updated ReservedSprayPaintSlot

- Added ReservedWeaponSlot

- Updated SCPDunGen

- Updated TooManyEmotes

- Updated Kast

- Updated ReservedItemCore

- Added MinecraftScraps

## 0.2.3

- Removed CheaperFuelCompany

- Added FreeMoons

- Added LethalExpansion

- Added Custom Moons (DuckMoons, OldSeaPort, and Kast)

- Updated ReservedItemSlotCore

- Added ReservedSprayPaintSlot

- Updated NuclearLib

- Fixed Update Scripts and re-added Install Script

## 0.2.2

- Update TooManyEmotes

- Update HexiBetterShotgun

- Update SCPDunGen

- Add MaskTheDead

- Remove `install.bat` (Deprecated. Keeping `install-other.bat` for my testing)

## 0.2.1

- Added an auto-update Script

- Update Backrooms

- Update DiscountAlert

- Add Corporate Restructure

- Remove Diversity (Fixes the dungeons being pitch black)

- Remove MoonOfTheDay (Fixes seeds not randomizing)

- Add SuitSaver

- Add CorporateRestructure

## 0.2.0

- Updated TooManyEmotes (Fixes an issue with favorite emotes not saving)

- Updated Diversity (Fixes multiple issues, mainly audio bugs)

## 0.1.9

- Updated Neofetch

- Updated LethalEscape (Fixes lag issues)

- Updated DiscountAlert

- Updated Symbiosis (Hoarding Bugs disperse after nest return allowing space for others, spawns flies on player corpses after ~1 minute)

- Updated LethalThings (Glizzy is no longer called "Training Manual")

- Updated ReservedItemSlotCore (Fixes compat with LethalThings)

- Updated TooManyEmotes (Fixes player shadow render, Added Emotes Loadout)

- Added BuyableShotGun (and shells)

- Added HexiBetterShotgun (Shotguns will now fire 10 pellets rather than either a single hitscan)

## 0.1.8

- Remove MetalRecharging because of Conflict with Lethal-Things

- Remove Leftover files from previous mods

- Remove ShipClock (It was broken)

- Some monsters now have a chance to escape the facility and chase you! (Braken, Jester, Spider)

- Added More Cosmetics

- Added NoSellLimit! There is no longer a limit to how many items you can sell at a time when at the company building

## 0.1.7

- Fixed Backrooms config to lower chances of being yanked into the backrooms

- Added LethalLanFix to allow for direct IP connections

- Added Discount Alerts

- Added Diversity, which revamps a lot of monsters

- Updated ExplodingPresents

- Removed IntroTweaks

- Added FrostyCosmetics

- Removed More Emotes in order to fix an issue where players hands would disappear

- Fixed Spawn weight for Coil Heads

- Added YieldDmgTweak which makes Yield signs do more damage

- You can now help your friends out whenever a centipede is latched onto their head by spamming the use button if you don't have a shovel.

## 0.1.6

- Updated Late Company

- Teleporters no longer make you drop tools (only scrap)

- Fixed an issue where mask possession happened WAY too often

- Update Slime Taming

- Boomboxes will now autoplay to the next song instead of looping

- Boomboxes no longer have battery life

- You can now clip into the backrooms (have fun with that)

- Added LethalThings! Adds 9 scrap, 6 store items, 1 enemy, 4 decor, 1 map hazard, and 1 game mechanic (ROCKET LAUNCHERRRRRRRRR)

- SCP Foundation is now a dungeon chance for Rend, Dine, and Titan

## 0.1.5:

- Update TooManyEmotes

- Add more player Cosmetics

- Deadlines now scale properly, you are granted more days as the quota grows

- Fixed an issue with the flashlight not working with LMB when not in reserved slot

- Health now displays in numbers

- Added 2 new songs (Locked out of Heaven and Boys a liar)

- Masks will now actively try and possess you by trying to switch your active hand to the mask

## 0.1.4:

- Re-added Employee Assignments

- Reworked Masked Enemies (Masks no longer show)

- HOPEFULLY fixed an issue where items became invisible for other players when dropped

- Re-Added old emotes along with the new ones

- Rotated Suits (added some custom ones too)

- Fixed sprinting on ladders

## 0.1.3:

- Added new emotes along with a new emote system! `Keybind: ~`

- Added Coil Head Stare!

- Flashlights now dim as their batteries die

- Presents now have a 5% chance to explode when opened

- Items now cycle properly when dropped

- You can now charge metal!

- There is now a compatibility checker to see what mods you are missing when joining a lobby

- Removed Death Voting because it was breaking stuff

- Fixed the install scripts to automatically remove all mods and re-install

## 0.1.2:

- Updated MoreEmotes

- Updated LateCompany

- Updated DeathVoting

- Updated BepInExUtils

- The Griddy no longer requires empty hands

- Removed Life is a highway

- Mimics are far less common by default and no longer have a randomly chosen imperfection

- Added more songs (Duct Tape, Take the wheel, Pure Ecstasy, Yeat x Playboi Carti - VVV)

## 0.1.1:

- Update Mimics

- Update ScalingStartCredits

- Updated SkinWalker

- Players can no longer join your game until after the ship has gone into orbit

- Added Unlimited Paint

## 0.1.0:

- Removed some duplicated files

- Added Disable Speaker Intro

- Cheaper fuel, no longer need to pay to travel to Dine, Rend, and Titan (Terminal still shows a price)

- Added DK64 song to Jukebox

- Fixed skinwalkers barely talking

- Increase range to push

- Decrease push strength

- Increase scaling credits to 25/player

- Decrease player requirement for scaling from 4 -> 2

## 0.0.9:

- Remove Pinger

- Remove Assignments

- Remove LC_API

## 0.0.8:

- Fixed Voicelines being to common

- Finished the install script for people who's games aren't on their C:\ Drive

## 0.0.7:

- Full Update 45 Support

- Enemies no longer play voice lines when dead

- Removed some unnecessary logs

- Added Masked and Nutcracker to the config

- Fixed an issue where audio would randomly play outside

- Slightly reduced mimic spawn rate

- New imperfections for telling mimics apart from the real deal

- Modified Discord RPC

## 0.0.6: 

- Semi Update 45 Support

- Hoarding Bugs are now capable of pulling the pin from Stun Grenades

- Extension Ladders will now drop when utilized by Hoarding Bugs

- Hoarding Bugs are now able to stop using items

- Clapping animation now makes noise (and monsters can hear it)

## 0.0.5:

- Add Custom Boombox Songs (Jellyfish Jam, Ain't no mountain high enough, Life is a highway, Party in the USA)

- New Death voting system (Now requires at least 2 people to vote to leave early)

- Credits are now scaled properly with more than 4 players

- Right click scanning now shows the dollar amount of scrap currently on the ship

- Mod Installation Script (Only for users who install their game to their host drive)

## 0.0.4:

- Added Pushing

- Added Clock in Ship

- Added Fixed Slime Taming, they will no longer deal damage when the Boombox is playing

- Added Intro Tweaks. Now skips launch options (Because who uses lan?)`

## 0.0.2/0.0.3: 

- Initial Upload