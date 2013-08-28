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

Getting OAUTH keys
==================
To run this script you need to register it as an app first

Get Consumer Key and Secret Key [from tumblr]http://www.tumblr.com/oauth/apps

 Edit consumer_key and consumer_secret in auth.py
 Install python, python-oauth2, python-poster
 Run python auth.py
5) go to url
6) 'allow' in tumblr web page
7) y (yes authenticated)
8) copy url you are returned to: ex google.com/?oauth_token=927839871293871928hikjb copy this long key (as PIN)
9) PIN = number copied from step 8
10) Edit photo2tumblr.py
CONSUMER_KEY = ''
CONSUMER_SECRET = ''
OAUTH_TOKEN = ''
OAUTH_TOKEN_SECRET = ''
DIR = 'dir/with/pictures'
FILE_MASK = '*.jpg'
BLOG = 'blog here'
11) Careful about BLOG
WRONG: http://josenaves.tumblr.com/
RIGHT: josenaves.tumblr.com
12) python photo2tumblr.py

Usage
=====

