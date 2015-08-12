<?php
require 'vendor/autoload.php';

/**
 * Giv'em some help
 */
$showHelp = function() {
	echo <<<HELP
Gets data from a NEON & PHP file and saves it as a HTML file

	Required Options
		-i	Input neon file
		-p	Input php file
		-o	Output html file
HELP;
};

	
// options
$neon = null;
$opt = getopt('i:o:p:h');

// error OR just needs a little help
if(isset($opt['h']) || isset($opt['help'])) {
	$showHelp();
	exit;
}

if(!isset($opt['i']) || !isset($opt['o']) || !isset($opt['p'])) {
	echo 'Error, missing required option.', PHP_EOL, PHP_EOL;
	$showHelp();
	exit(1);
}

// not missing neon or config
try {
	$data = file_get_contents($opt['i']);
	$neon = \Nette\Neon\Neon::decode($data);
	
	// make some room
	if(!is_dir(dirname($opt['o'])))
		mkdir(dirname($opt['o']), true);
	
	ob_start();
	
	require $opt['p'];
	
	/**
	 * spaceless HTML compression
	 * @link https://api.drupal.org/api/drupal/core!vendor!twig!twig!lib!Twig!Node!Spaceless.php/8
	 */
	file_put_contents($opt['o'], trim(preg_replace('/>\s+</', '><', ob_get_clean())));
} catch (\Exception $e) {
	echo 'Data could not be written';
	exit(1);
}