<?php
define("ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);
define("BIN", ROOT . "Binaries" . DIRECTORY_SEPARATOR);
define("PHAB", "http://phabricator.burningreality.de/");
define("OS_ARCH", isset($_SERVER["ProgramFiles(x86)"]) ? 64 : 32);

require_once __DIR__ . '/inc.php';
require_once __DIR__ . '/Cli.php';

Cli::output("This will install the Apex Studios Tool Package");
Cli::output("");
Cli::output("");
Cli::output("The tool package will be installed into the following directory:");
Cli::output("\t" . ROOT);
Cli::output("");
Cli::output("Yes, this it's being installed right into this directory.");
Cli::output("");
printHr();
Cli::output("Do NOT move the folder around nor delete it after installing!");
printHr();
Cli::output("Got that?");
Cli::output("");
Cli::output("Accepting is your only option. So please press a key");
dontMove();
Cli::output("");
Cli::output("");

selectScreen();
