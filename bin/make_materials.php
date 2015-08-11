<?php
require 'vendor/autoload.php';

/*
 * The MIT License
 *
 * Copyright 2015 Mo.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

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