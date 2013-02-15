@echo off

goto startmsg

:setenv
echo.
echo  Setting environment variables
echo.

echo SetEnv PATH for PHP to
echo %CD%\PHP
SetEnv -a PATH %%%CD%\PHP
echo Check

echo.

echo SetEnv PATH for Arcanist
echo %CD%\Arcanist\bin
SetEnv -a PATH %%%CD%\Arcanist\bin & echo Check  echo Not
echo Check
echo.
echo  Sucessfully set environment variables

goto selectmsg

:install-certificate
echo.
echo  I will now install the Arcanist certificate for you.
echo  This will enable to identify you in Phabricator without you having to type in your username
echo  or password for Arcanist.
echo.
echo  You will be asked to open the Phabricator website, which will require you to login. Just keep
echo  %PHAB%conduit/token open already, you'll save yourself some work
echo.
echo Ready?
pause
echo.

arc install-certificate
goto selectmsg

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

:selectmsg
echo.
echo  1. Set up environment variables
echo  2. Install certificate for Arcanist
echo  3. Do some things
echo  4. Environment variables not set?
echo     1) Try to restart



