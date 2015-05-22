# GT Sailing Website
* Automatically exported from http://code.google.com/p/gtsailing-website.
* This is the code for the Sailing Club at the Georgia Institute of Technology
* www.gtsailing.org

## Mission
### Make the Site Attractive for Non-Members
* Use current pictures of the club sailing
* Make a sleek, new design (new color scheme, layout, etc.)
* The website is the hook
* Make the race team stand out for competitive non-members

### Make the Site More Informative
* Update contact information
* Add what members can do by being part of the club
* Show off Lake Lanier
* How accessible is the lake?
* Show off boats and facilities
* Create section for race team

### Less Content Per Page
* Too much content makes people not want to read it (tl;dr) and makes the page look cluttered
* Pictures are worth a 1,000 words

### Facilitate Club Organization
* The website should help exec manage the club

## Technology
* The code is in PHP, HTML, CSS, and javascript.
* Some utilities are written in Java.
* I use [XAMPP](https://www.apachefriends.org/index.html) to run the site locally, but any PHP host should work.
Make sure to make the `server/content/` folder the root of the server.
* Manage the website using www.websitesettings.com. Credentials are located on t-square.

## Developer Setup (using XAMPP)

1. Clone the git project onto your local computer.
1. Download [XAMPP](https://www.apachefriends.org/index.html)
1. Intall XAMPP in `trunk/server/xampp`
1. Change `DocumentRoot` to `<path_to_trunk>/server/content` in `trunk/server/xampp/apache/conf/extra/httpd-ssl.conf`
1. Change `DocumentRoot` and `<Directory ...>` to `<path_to_trunk>/server/content` in `trunk/server/xampp/apache/conf/httpd.conf`

## Structure
### Organization
I have divided the project into 3 folders:
* `closet` Contains resources that could be used on the website in the future. It is mostly just a bank of good pictures.
* `server` Contains all of the files that need to be loaded onto the server.
The `content` folder should be the root of the server.
* `utilities` Contains things that help with development (e.g. a copy of USBWebServer)

### Public File Access
Only certain files should be accessable by the public.
For example, the user should not be able to load a PHP template directly.
Files that the users should not have access to are located in the `includes` folder,
and the files that they should have access to are located in the `content` folder.

### Templates
The way templates work was inspired by ASP's master pages.
Each template has sections that the child pages need to fill in with content.
For example, a template could have a "header" section and a "main_content" section.
Each child page has separate files for each section in the template.
The naming scheme for these section files is `[page_name].[section_name].php`.
Continuing the example, the history page would have `history.header.php` and `history.main_content.php`.
Each child page has its own folder to store these section files as well as any other files that it needs (e.g. CSS and JS files).
The `index.php` file in the folder initializes the template variables and includes the template.
From there, the template includes the appropriate files and sections to build the complete page.

So, our history page example could look something like this:
* `history/`
  * `history.header.php`
  * `history.main_content.php`
  * `history.css`
  * `old_picture.jpg`
  
If you need to create a new template, I suggest using an existing template as an example.
Essentially, the template needs to import the variables that were set in the child page's `index.php` and then include the apporopriate files in the appropriate locations.
