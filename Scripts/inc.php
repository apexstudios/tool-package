<?php
function printHr()
{
    println();
    Cli::output(str_repeat("=", 80));
}

function println($text = "")
{
    echo $text . PHP_EOL;
}

function addToPathEnv($env)
{
    $path = ROOT . $env;
    Cli::notice(sprintf("Adding %s to %%PATH%%", $path));

    $ret_val = -5;
    $cmd = BIN."SetEnv -ua PATH %" . $path;
    Cli::output(" Debug   :\t" . $cmd);
    passthru($cmd, $ret_val);

    if ($ret_val === 0) {
        Cli::success("Check");
        return true;
    } else {
        Cli::error("Failure - error code " . $ret_val);
        return false;
    }
}

function readInput()
{
    return fread(STDIN, 99);
}

function concatString(array $array)
{
    return implode("\n", $array);
}

function checkEnvVars()
{
    $ret_php = -1;
    $output_php = array();

    $ret_arc = -1;
    $output_arc = array();

    exec("php -v", $output_php, $ret_php);
    exec("arc help", $output_arc, $ret_arc);

    if ($ret_arc === 0 && $ret_php === 0) {
        return true;
    } else {
        if ($ret_arc) {
            Cli::error("Could not add Arcanist to the enviromnment");
            echo concatString($output_arc) . PHP_EOL;
        }

        if ($ret_php) {
            Cli::error("Could not add PHP to the environment");
            echo concatString($output_php) . PHP_EOL;
        }

        return false;
    }
}

function selectScreen()
{
    println();
    println();

    Cli::output("1. Set up environment variables");
    Cli::output("2. Install certificate for Arcanist (requires 1.)");
    Cli::output("3. Install TortoiseSVN");
    Cli::output("4. Install TortoiseGit and Git for Windows");
    Cli::output("5. Install Notepad++ 6.3");
    Cli::output("6. Configure Arcanist to use Notepad++");
    Cli::output("0. Exit");
    println();
    Cli::notice("You can press Ctrl+C anytime to exit");
    println();
    Cli::output("How do you feel today?");

    $selection = readInput();

    switch ($selection) {
        case 0:
            exit(0);
            break;
        case 1:
            Cli::notice("If plenty of error messages pop up, don't worry. That's just me testing whether it works or not. The error messages penetrate my error blocking barreers...");
            Cli::output("Press a button to continue");
            dontMove();

            ob_start();
            $checkEnv = checkEnvVars();
            ob_end_clean();

            if ($checkEnv) {
                println();
                Cli::success("Environment already set up - no need to change");
            } else {
                addToPathEnv("PHP");
                addToPathEnv("arc\arcanist\bin");

                Cli::notice("Please restart the install script (that is, close this window completely) and re-run this step to see if it worked.");
                Cli::output("You know that it failed when the same errors happen.");
            }
            break;
        case 2:
            installCertificate();
            break;
        case 3:
            Cli::notice("Please remember to install with the command line tools feature");
            println();

            Cli::notice("Installing TortoiseSVN");
            exec("start " . ROOT . "Installers\TortoiseSVN\TortoiseSVN-1.7.11.23600-" .
                (OS_ARCH == 32 ? "win32" : "x64") . "-svn-1.7.8.msi");
            break;
        case 4:
            Cli::notice("Installing TortoiseGit");
            exec("start " . ROOT . "Installers\TortoiseGit\TortoiseGit-1.8.1.0-" . OS_ARCH . "bit.msi");

            Cli::notice("Please wait until TortoiseGit has finished installing.");
            dontMove();

            Cli::notice("Installing Git for Windows");
            exec("start " . ROOT . "Installers\GitForWindows\Git-1.8.1.2-preview20130201.exe");
            break;
        case 5:
            Cli::notice("I recommend installing into the default directory.");
            println();
            Cli::notice("Installing Notepad++ 6.3");
            exec("start " . ROOT . "Installers\Notepad++\npp.6.3.Installer.exe");
            break;
        case 6:
            installArcEditor();
            break;
        default:
            Cli::output("Invalid input!");
            break;
    }

    selectScreen();
}

function dontMove()
{
    exec("pause");
}

function php($cmd)
{
    exec("start php -f " . ROOT . $cmd);
}

function arcInstall()
{
    echo exec("start arc install-certificate");
}

function installArcEditor()
{
    $cmd = "arc set-config editor \"\\\"C:\\Program Files (x86)\\Notepad++\\notepad++.exe\\\" -multiInst -nosession\"";

    Cli::output("This will configure Arcanist to use Notepad++");
    println();
    Cli::notice("I'm assuming the default install path in C:\\Program Files (x86)\\Notepad++\\notepad++.exe");
    println();
    Cli::output("If this is not the case, stop right here. I'll add support for custom paths in the future.");
    Cli::output("I can't be bothered to do it right now.");
    
    println();
    passthru($cmd);
}

function installCertificate()
{
    Cli::output("I will now install the Arcanist certificate for you.");
    Cli::output("This will enable to identify you in Phabricator without you having to type in your username");
    Cli::output("or password for Arcanist.");
    println();
    Cli::output("You will be asked to open the Phabricator website, which will require you to login. Just keep");
    Cli::output(PHAB."conduit/token open already, you'll save yourself some work");
    println();
    Cli::output("Also, a new window will open, where you will be able to do all the work.");
    println();
    Cli::output("Ready?");
    dontMove();
    arcInstall();
}
