/**
 * From camelCase to Normal Case
 * 
 * @link http://phpjs.org/functions/ucwords/
 * @link http://jamesroberts.name/blog/2010/02/22/string-functions-for-javascript-trim-to-camel-case-to-dashed-and-to-underscore/
 * @type @exp;item@call;replace
 */
function niceName(name) {
	return name
	.replace(/([A-Z])/g, function($1) { // camelCase -> normal Case
		return " " + $1
	}).replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function($1) { // normal Case -> Normal Case
		return $1.toUpperCase();
	});
}