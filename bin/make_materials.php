<?php
require 'vendor/autoload.php';

/**
 * Giv'em some help
 */
$showHelp = function() {
	echo <<<HELP
Gets data from a NEON file and saves it as a JS file

	Required Options
		-i	Input neon file
		-o	Output js file
HELP;
};

	
// options
$neon = null;
$opt = getopt('i:o:h');


// error OR just needs a little help
if(isset($opt['h']) || isset($opt['help'])) {
	$showHelp();
	exit;
}

if(!isset($opt['i']) || !isset($opt['o'])) {
	echo 'Error, missing required option.', PHP_EOL, PHP_EOL;
	$showHelp();
	exit(1);
}

// not missing neon or config
try {
	$data = file_get_contents($opt['i']);
	$neon = \Nette\Neon\Neon::decode($data);
	$json = json_encode($neon);
	file_put_contents($opt['o'], "var materials = $json;");
} catch (\Exception $e) {
	echo 'Data could not be written';
	exit(1);
}