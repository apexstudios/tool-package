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

Follow these instructions:

 - When you already have `svn` or `TortoiseSVN` installed:
   - Go to a safe location without any spaces in the path where you can install things, like `C:\Apps`. Create a folder structure so it resembles this: `C:\Apps\apexstudios\tool-package`. Go into that folder.
 - Else:
   - Download the [_ZIP_ file](https://github.com/apexstudios/tool-package/archive/master.zip)

 - You may have to start an instace of `cmd.exe` to run the `install.bat` properly. To do so, follow these steps:
   # Open the //Run...// dialogue. Type in 

   - To do the initial set up, run the `install.bat`
   - It will set up environment variables pointing to `arc/arcanist/` and `PHP/`
   - If I have managed to finish it in time, it will also ask you to do the _Arcanist_ set up (installing the
     certificate, that is)

 - To install _TortsoiseSVN_, select //Option 3// from the installer
   - Make sure that you have the `command line client` tools checked! They are required for _Arcanist_.

 - If you want to profit from _Git_ and its wonderful `git svn` tools, follow these install instructions:
   - Install _TortoiseGit_ from `Installers/TortoiseGit/` - it's very similar to _TortoiseSVN_
   - Install _Git for Windows_ from `Installers/GitForWindows/` - it's required for _TortoiseGit_
   - I'm too lazy to tell you how to use them - maybe another time

Notes for _Git for Windows_ (*not* _TortoiseGit_):
 - Installation of msysGit can be done with preselected options, however, no need to install the "Windows explorer integration". If you know about CRLF and LF line endings and you have editors coping with that, you should select "Checkout as-is, commit as-is" in order to prevent automatic change of line endings (Git usually uses Linux-style, though we have Windows-style)
