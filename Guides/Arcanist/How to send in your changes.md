This may come off all confusing. I recommend doing a _Hangout_ with me or otherwise in some way like _Team Viewer_ so we can do a proper and guided walkthrough.

Also, please refrain from uploading big files to _Differential Revisions_! You can commit it right away when you add a new unit or reskin something. Also, changes to `MasterTextFile_XXX.dat` should also not be sent in for review.

If you're using Git/TortoiseGit
===============================

SVN/TortoiseSVN users, ignore this.

The first time you run `arc diff`, you will be asked against which branch you want to have the changes aggregated for send-in. It will ask you for `origin/master` - this is indeed the default, but not desirable for us. Use `git-svn` or `master`.

Then each time you use `arc diff`, all commits ranging from the base branch you selected and the commit you are on will be selected and sent in to create/update a _Differential Revision_. Which ones are going to be included will be displayed when you use `arc which`.

Only the changes from the commits will be taken. Unstaged/staged changes that are not commit will not and can not be used, and will even break `arc diff`. So make sure you have no changes made in your working copy. If you have, either commit them (and thus add the to the revision), or stash them with `git stash save` (you can get them back with `git stash pop`).

Else it is very similar to above. Except that every change is in the commits, not in the working copy. Which of course changes when you change branches. _So watch out_.

If you're SVN
=============

Creating a new Revision
-----------------------

First, make sure that you do not have commited the changes (else Code Review would be pointless). Use TortoiseSVN's Commit tool to review the changes. As how they appear in there they will be sent in for review in a _Differential Revision_. *Do not commit.*

As the first step, you should run `arc which` on the command line. Remember whether it identified a matching _Differential Revision_ or not. If it did, also note whether it is true or not.

Run `arc diff` on the command line. Note that when `arc which` identified a revision that was not supposed to be, do `arc diff --create`.

If you had added new files that are not in SVN yet, it will ask you whether you want to ignore them (continue without adding) or include them.

Updating a Revision
-------------------

I assume that you have sent in a _Differential Revision_ and want to continue working on it. Adjusting shield strengths because someone complained, adding some new stuff to the revision, etc.

Now, you want to update the existing _Differential Revision_ to incorporate the new changes. Easily done.

Verify that the changes from the revision itself are still contained to the extend of their update status (means, if you deleted / reverted a change, it should naturally be gone). This means that the working copy should include the changes from the revision *and* the new changes.

Verify the identified revision with `arc which`.
 - If it's the right one, just `arc diff` again. When editing the revision message, the commented out message should say "Updating revision ..."
 - If not, force to update a revision using `arc diff --update D123`

Specify a message describing the changes you made compared to the last one. You won't be able to change revision fields from here. A Bond One-Liner is enough. Like `Hasta la vista, bug` or `Begone, zombie of a typo`.

Conclusion
==========

May your hands reek of fried chicken and your fingers lickin' good. Because `arc` requires more than just 13 secret ingredients. Do _Differential Revision_ plentyful, you will get the hang out of it. Your code quality and care for beauty as well as Zen level and Code Fu skills will increase alltogether.

@DGaius
Yes, I do force you to do it. That's why I'm doing this guide.

@Blamtroid
Catch me on xfire if you have questions. Or feedback on the quality of this guide.
