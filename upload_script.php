<?php

//name of blog
$blog_name = "exampleblog.tumblr.com";

//define path to root and site url
defined('SITE_URL') ? null : define('SITE_URL',  $blog_name);

//Application Keys
define('CONSUMER_KEY', 'your_key');
define('CONSUMER_SECRET', 'your_secret');

//User Keys
define('OAUTH_TOKEN', 'your_token');
define('OAUTH_TOKEN_SECRET', 'your_secret');

function findOldestFile($directory) {

	//change the wildcard here if you want jpgs or pngs		
	$files = glob($directory.'/*.JPG');
	
	$exclude_files = array('.', '..');
	
	if (!in_array($files, $exclude_files)) {
		//Sort files by modified time, latest to earliest
		array_multisort( array_map( 'filemtime', $files),
			SORT_NUMERIC,
			SORT_ASC,
			$files
		);
	}

	if(!is_null($files))
	{	
		return $files[0];
	} else {
		return '__NOFILES__';
	}
}

//get oldest file in the directory of your choosing
$oldest_file = findOldestFile('./images');

//if there are no files exit program
if ($oldest_file == '__NOFILES__') {
	//exit program
	die();	
}

try {
 $oauth = new OAuth(CONSUMER_KEY,CONSUMER_SECRET);
 $oauth->enableDebug();

 $oauth->setToken(OAUTH_TOKEN,OAUTH_TOKEN_SECRET);
 $tumblr_post = array(
		'type'  => 'photo',
		"data"  => file_get_contents("$oldest_file"),
		'tags' => 'exampletag',
		'generator' => 'SITE_URL'
		    );
 
$oauth->fetch("http://api.tumblr.com/v2/blog/$blog_name/post", $tumblr_post, OAUTH_HTTP_METHOD_POST);
    
}
catch (OAuthException $E) {
  print "____________EXCEPTION_______________";
  print_r($E);
  //shutdown program
  die();
}

// if there are no problems delete file
unlink($oldest_file);

?>
