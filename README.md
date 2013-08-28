Tumblr Photo Upload
===================
A simple PHP script to upload a photo to Tumblr

Install PHP
============
Instructions for installing this can be found here: http://sergiopvilar.wordpress.com/2013/05/18/how-to-install-php-oauth-extension/ and is copied below:

Installing PEAR
---------------

PEAR is necessary to install PECL, with PECL we will install OAuth extension.
	
`sudo apt-get install php-pear`

You will also need additional PHP modules (like PECL) that can be installed as follows:

`sudo apt-get install php5-dev`
`sudo apt-get install libcurl3-openssl-dev`

Installing HTTP and OAuth extensions
------------------------------------

With PECL and PEAR once installed we can now install OAuth extension. Run from your terminal:
	
`sudo pecl install pecl_http`
`sudo pecl install oauth`

After this, open your php.ini and add the follows:

`extension=http.so;`
`extension=oauth.so;`

If you got this error installing oauth:

`pcre.h: No such file or directory`

On Ubuntu, run this and try again:

`apt-get install libpcre3-dev`

Get OAUTH keys
==================
To run this script you need to register it as an app first

Get Consumer Key and Secret Key [from tumblr](http://www.tumblr.com/oauth/apps)

Edit consumer_key and consumer_secret in auth.py with the values tumblr supplies

Install necessary python libraries
`sudo apt-get install python python-oauth2 python-poster`

Open a terminal and run `python auth.py` and go to the url

Press "allow" in the tumblr web page to authenticate it

In the terminal press `y` to confirm that it has been authenticated

Copy the oauth_token value in the url that is returned. For example, if the url is: https://twitter.com/?oauth_token=wzdfUMvf58VojPZHRiV2GaDnxmoc5McAsdXpxsM9lwpCHRPKJm&oauth_verifier=5WSFWfjaztzE5x3O9GsfzFpKk1snwGpgKGiXQ2PJImOoBi5rsq#_=_ then copy 5WSFWfjaztzE5x3O9GsfzFpKk1snwGpgKGiXQ2PJImOoBi5rsq 

In the terminal paste the oauth_verifier value in as your PIN

Open tumbler_upload_script.php and modify the following values

`define('CONSUMER_KEY', '');` - Value from the tumblr apps page
`define('CONSUMER_SECRET', '');` - Value from the tumblr apps page
`define('OAUTH_TOKEN', '');` - Value returned from entering PIN
`define('OAUTH_TOKEN_SECRET', '');` - Value returned from entering PIN

Usage
=====
Change the $blog_name variable to your blog address (minus the http://)

Change the location of your images in $oldest_file

Run `php tumblr_photo_upload.php`

Notes
=====
This script deletes a file once it has been uploaded, so make backups first!

It's best run with a cron job
