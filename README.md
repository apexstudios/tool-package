Apex Studios Tool Package
=========================

This is the tool package used at Apex Studios for day-to-day work.

Includes
========

Following software packages are included is included:

 - TortoiseSVN
 - TortoiseGit and Git for Windows (explained later)
 - PHP 5.4
 - Arcanist

Tools may be added without further notice.

Intended for internal use only
==============================

We do not take care for compatibility on external systems

Install
=======

## Follow these instructions ##

 - When you already have `svn` or _TortoiseSVN_ installed:
   1. Go to a safe location without any spaces in the path where you can install things, like `C:\Apps`. Create a folder structure so it resembles this: `C:\Apps\apexstudios\tool-package`. Go into that folder.
   2. Check out from this URL: `https://github.com/apexstudios/tool-package/trunk`
   3. Continue
 - Else:
   1. Download the [_ZIP_ file](https://github.com/apexstudios/tool-package/archive/master.zip)
   2. Extract it to a safe location (and probably remove the master in the folder name)
   3. Continue
 - You may have to start an instace of `cmd.exe` to run the `install.bat` properly. To do so, follow these steps:
   1. Open the //Run...// dialogue
   2. Type in `cmd`
   3. Type in the drive where the folder is located, like this: `e:`
   4. Type `cd `, followed by the copy-pasted path (you can't Ctrl+V, do a right-click), like this: `cd E:\Apps\tool-package`
   5. Run `install.bat` (type and enter)
 - To do the initial set up, run the `install.bat`
   - It will set up environment variables pointing to `arc/arcanist/` and `PHP/`, which are required
     1. Select _Option 1_
     2. Restart the installer
     3. Select _Option 1_
     4. Verify that it does not install again
     5. Profit
   - If I have managed to finish it in time, it will also ask you to do the _Arcanist_ set up (installing the
     certificate, that is)
     1. Select _Option 2_
     2. Go to [http://phabricator.burningreality.de/conduit/token/]()
     3. Copy the line consisting of random numbers and letters
     4. Paste it into the new window that popped up
     5. Profit
 - To install _TortsoiseSVN_, select //Option 3// from the installer
   - *Make sure* that you have the `command line client` tools checked! They are required for _Arcanist_.
 - If you want to profit from _Git_ and its wonderful `git svn` tools, follow these install instructions:
   1. Select _Option 4_
   2. Install one after each other
   - I'm too lazy to tell you how to use them - maybe another time

## Notes for _Git for Windows_ (*not* _TortoiseGit_) ##
 - Installation of msysGit can be done with preselected options, however, no need to install the "Windows explorer integration". If you know about CRLF and LF line endings and you have editors coping with that, you should select "Checkout as-is, commit as-is" in order to prevent automatic change of line endings (Git usually uses Linux-style, though we have Windows-style)
