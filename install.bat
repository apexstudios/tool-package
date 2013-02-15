@echo off

goto startmsg

:setenv

SetEnv -a PATH %%%CD%\PHP
SetEnv -a PATH %%%CD%\Arcanist\bin

:startmsg
echo  This will install the Apex Studios Tool Package
echo.
echo.
echo  The tool package will be installed into the following directory:
echo         %cd%\
echo.
echo  Yes, this it's being installed right into this directory.
echo.
echo.
echo ================================================================================
echo         Do NOT move the folder around nor delete it after installing!
echo.
echo ================================================================================
echo  Got that?
echo.
echo  Accepting is your only option. So please press a key
pause

set BINDIR=Binaries\
set PHAB=http://phabricator.burningreality.de/


echo %CD%PHP

