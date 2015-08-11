/**
 * recursive function to get price
 * 
 * @param {type} name
 * @param {type} quantity
 * @param {type} build_per
 * @param {type} data
 * @returns {Number|grab.data}
 */ 
function grab(name, quantity, build_per, data) {
	var ret = 0;

	if(typeof data[name] === "number") {
		ret = data[name];
	}

	else if(typeof data[name] === "object") {
		for(var k in data[name])
			ret += grab(k, data[name][k], build_per, data);
		ret *= build_per;
	}

	return quantity * ret;
}