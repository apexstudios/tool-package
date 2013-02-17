First off
=========

This may come off all confusing. I recommend doing a _Hangout_ with me or otherwise in some way like _Team Viewer_ so we can do a proper and guided walkthrough.

Also, please refrain from uploading big files to _Differential Revisions_! You can commit it right away when you add a new unit or reskin something. Also, changes to `MasterTextFile_XXX.dat` should also not be sent in for review.

Creating a new _Differential Revision_
======================================

If you're using Git/TortoiseGit
-------------------------------

SVN/TortoiseSVN users, ignore this.

The first time you run `arc diff`, you will be asked against which branch you want to have the changes aggregated for send-in. It will ask you for `origin/master` - this is indeed the default, but not desirable for us. Use `git-svn` or `master`.

Then each time you use `arc diff`, all commits ranging from the base branch you selected and the commit you are on will be selected and sent in to create/update a _Differential Revision_. Which ones are going to be included will be displayed when you use `arc which`.

Only the changes from the commits will be taken. Unstaged/staged changes that are not commit will not and can not be used, and will even break `arc diff`. So make sure you have no changes made in your working copy. If you have, either commit them (and thus add the to the revision), or stash them with `git stash save` (you can get them back with `git stash pop`).

Else it is very similar to above. Except that every change is in the commits, not in the working copy. Which of course changes when you change branches. _So watch out_.

If you're SVN
-------------

Creating a new Revision
~~~~~~~~~~~~~~~~~~~~~~~

First, make sure that you do not have commited the changes (else Code Review would be pointless). Use TortoiseSVN's Commit tool to review the changes. As how they appear in there they will be sent in for review in a _Differential Revision_. *Do not commit.*

As the first step, you should run `arc which` on the command line. Remember whether it identified a matching _Differential Revision_ or not. If it did, also note whether it is true or not.

Run `arc diff` on the command line. Note that when `arc which` identified a revision that was not supposed to be, do `arc diff --create`.

If you had added new files that are not in SVN yet, it will ask you whether you want to ignore them (continue without adding) or include them.

It should now open up Notepad++ or whatever editor you configured. You will desire to type in a _Revision Message_ here. See part `General > Revision Fields` of this guide.

Save the file, close the editor. _Arcanist_ will brabble about how no `Lint Engine` and no `Unit Test Engine` was configured. Ignore that.

You will get a summary of the new revision, including the revision id, a link to the newly created revision, and a list of the included files.

???

Wait for ~~bashing~~ praise comments and approvals.

Updating a Revision
~~~~~~~~~~~~~~~~~~~

I assume that you have sent in a _Differential Revision_ and want to continue working on it. Adjusting shield strengths because someone complained, adding some new stuff to the revision, etc.

Now, you want to update the existing _Differential Revision_ to incorporate the new changes. Easily done.

Verify that the changes from the revision itself are still contained to the extend of their update status (means, if you deleted / reverted a change, it should naturally be gone). This means that the working copy should include the changes from the revision *and* the new changes.

Verify the identified revision with `arc which`.
 - If it's the right one, just `arc diff` again. When editing the revision message, the commented out message should say "Updating revision ..."
 - If not, force to update a revision using `arc diff --update D123`

Specify a message describing the changes you made compared to the last one. You won't be able to change revision fields from here. A Bond One-Liner is enough. Like `Hasta la vista, bug` or `Begone, zombie of a typo`.

Doing it the hard way
---------------------

This is actually quite simple, though you will get bored fast when doing it hundreds of times.

Steps to world domination:
 1. Create a patch
 2. Go to _Differential_ in _Phabricator_
 3. Click _"Create new diff"_
 4. Copy'n'Paste the diff into the big box - fill out the rest
 5. Press Enter
 6. ???
 7. Profit!

General
=======

Revision Fields
---------------

You have the option to fill out several fields in the revision message. I'll assume you do it the easy way, typing the revision message in Notepad++

### Revision Title ###

This is simply the first line. It will be used as the title displayed in _Differential_, and will also appear as the first line in the landed commit.

Keep the Revision Title short - really short. And especially, *keep it to one single line*. If I want to read a book, I'll already go into the library.

Also, do not put anything too specific into the Revision Title. It should be general. Not categories though, that's going too far. Remarks are allowed though, as long as the message content is clear. Details should go into the `summary`.

Bad examples:

`Reduced precision for UNSC Frigates from 6.0 to 12.0`

`Starbase's shields are now OVER 9000`

`Made Mako bigger, Halcyon smaller, CCS even longer`

`Covenant, go f--k in hell now, because awesomeness ensues now!`

`Strength upgrade`

*`Forgot what I changed`*

`Bug T158, begone!`

Good examples:

`Amping up damage for Plasma Torpedoes`

`Gave the frigate a new model - again`

`changing the sizes of several ships`

`Forgot to upload the frigate model in rAPCAW938, doing this now`

`Fixed T158 - Shipyards won't go rampant and spam the map with fighters`

NOTE: I do not recommend to use any formatting here except for some `**bold**` or `//italic//` action. It's pointless. It will only be rendered in _Diffusion_, which you will probably have never heard of.

NOTE: Everything up until the next _Revision Field_ counts as the _Revision Title_. _So watch out_.

### Summary ###

How obvious. Include the details regarding your changes here. You may use formatting as you like (since this is _Phabricator_ we're talking about, use _Remarkup_ instead of _Markdown_ or _BBCode_).

It may also span multiple lines or paragraphs. As long as you want. Until the next _Revision Field_ comes along, that is.

Bad example:

`The task was to apply some patches, so I applied all of them.`

`Just some changes I forgot about`

Good example:

```
I applied the patches @anhnhan sent me.

 - Make ships stronger
 - Fix auto cannon goodness
```

`Made the archers less red. Also made them smaller since their previous size was ridiculous.`

### Test Plan ###

Not required, but preferable. Describe your plan regarding how you tested the changes. Saves time for others so they don't necessarily have to test whether the change actually has actually any effect (you may have forgotten to add a new unit to `Starbases.xml`).

For visual changes I'd prefer it if you link an image right now (means already uploaded in _Files_ or `imgur.com` or smth else) of afterwards. You can post it in a comment if you want, not necessary to edit the revision just for this.

Bad examples:

`Should work fine`

`Can't be bothered`

Ok ones:

`Difficult to test - had a good feeling though when looking at the archer missile trail - best you look at it, too`

`The Corvette rocks now :D`

### Reviewers ###

Specify a comma-separated list of the reviewers here. The names are for Phabricator, means my name is `anhnhan` instead of `Anh Nhan`.

NOTE: Currently _Differential_ only requires one reviewer to accept to pass. As soon as one rejects the code though, he must be satisfied. No one else can jump in to accept. Also, anyone can actually jump in and accept / reject the revision without having been specified here.

### CC ###

Add these dudes to the notification list. They don't appear as Reviewers. They just read along.

If no reviewers had been specified, the guys on CC will be promoted to act as Reviewers.

### Maniphest Tasks ###

You can specify _Maniphest Tasks_ here. _Differential_ will automatically add the corresponding association to both the _Differential Revision_ and the _Maniphest Task_. Means, when you are visiting the _Maniphest Task_, you can see that this _Differential Revision_ added changes related to this task; when visiting the _Differential Revision_, links and names will be added leading to the _Maniphest Tasks_ so you can read about what the tasks was.

Other things
------------

You can also skip the _Maniphest Tasks_ part in some cases. There is another way you can reference _Maniphest Tasks_. It's cooler, too.

When a revision would fix a bug totally or complete a feature that was captured in the beauty of a _Maniphest Task_, you can write for example `Fixes T123` or `Resolves T321`. You can also invalidate a _Maniphest Task_ with `Invalidates T142`.

Then, when the revision is accepted and lands in the repository (using `arc commit` or `arc land`), the _Maniphest Task_ receives a new status, too. It will be closed automatically. You won't have to do it manually!

NOTE: There are some more available. There are as well some variants, which just cover some tenses, like `Fixed`, `Fix`, `Resolve` etc.

Example Revision Message
------------------------

```
Fixes T123, T293 - Changes the look of the Archer Missiles

Summary: Made it smaller, less red. (T123)

Also makes less turns now, helping regarding the speed-up / slow-down issue. (T293)

Test Plan: watched them in game - looked fine

Reviewers: DGaius, Blamtroid

CC: Bornsteller
```

Your revision just got accepted!
================================

Yay! Proceed with the [_"How to land a revision into the repository"_](How to land a revision into the repository.md) to learn how to upload the contents of the revision to the repository.

Conclusion
==========

May your hands reek of fried chicken and your fingers lickin' good. Because `arc` requires more than just 13 secret ingredients. Do _Differential Revision_ plentyful, you will get the hang out of it. Your code quality and care for beauty as well as Zen level and Code Fu skills will increase alltogether.

@DGaius
Yes, I do force you to do it. That's why I'm doing this guide.

@Blamtroid
Catch me on xfire if you have questions. Or feedback on the quality of this guide.
