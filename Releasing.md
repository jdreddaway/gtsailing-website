# Rules for Releases #

  * **Links to unfinished pages should link to `construction.php` instead.** Nothing should link to `construction.php` when in the root.
  * **Pages should be mostly finished.** It is ok to release unfinished pages if you want feedback for them, but be aware that the public will be able to see it.

# Version Naming Scheme #

Versions are grouped into a folders by year. A number is assigned to each version, restarting at 1 every new year.

eg1. Version 3 of year 2014 will be located in `tags/2014/3`

eg2. Version 1 of year 2015 will be located in `tags/2015/1`

# How to Create Tag #

## What is a Tag? ##
Whenever you want to release a version of the website, you should create a tag. A tag is just a way to keep track of which revision of the website you have actually released. It is a special branch in the SVN repository. Once you make a tag, you should not modify its code unless you realize you made a small but serious mistake.

## Creating a Tag ##

This assumes that you are using TortoiseSVN and that you know how to get a clean working copy of the root.

  1. Start with a clean working copy of the root.
  1. Make changes to your working copy in accordance with the release rules above.
  1. Right click the `root` folder >> TortoiseSVN >> Branch/Tag...
  1. Change the path to `/tags/<year>/<version>`.
  1. Enter a log message.
  1. Click "Working Copy" in the "Create copy in the repository from:" section.
  1. Click "OK"