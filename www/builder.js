// if we get the JSON
$.getJSON('materials.json').success(function(materials){
	var ul = $('<ul>').addClass('materials').attr('id', 'list');

	for(item in materials) {
		/**
		 * From camelCase to Normal Case
		 * @link http://phpjs.org/functions/ucwords/
		 * @link http://jamesroberts.name/blog/2010/02/22/string-functions-for-javascript-trim-to-camel-case-to-dashed-and-to-underscore/
		 * @type @exp;item@call;replace
		 */
		var itemName = item.replace(/([A-Z])/g, function($1) { // camelCase -> normal Case
			return " " + $1
		}).replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function($1) { // normal Case -> Normal Case
			return $1.toUpperCase();
		});
		
		var li = $('<li>')
			.append(
				$('<label>')
					.text( itemName ) // no camelcase
					.append(
					$('<input>')
						.attr('type', 'number')
						.attr('data-item', item)
						.addClass('col-black')
						.addClass('spent')
						.val('0')
					).append(
						$('<span>')
							.addClass('spent')
							.text(0)
			));

		ul.append(li);
	}
	
	$('#list').html( ul.html() );


	// data has changed
	$('input').on('keyup keypress blur change', function () {
		var cost = 0, left;

		// get the cost
		$('#list input').each(function() {
			var price = grab(
					$(this).attr('data-item'),
					$(this).val(),
					$('#build_per').val() / 100 + 1,
					materials
				);
		
			$(this).next('.spent').text( numeral(price).format('0,0') );
		
			cost += price;
		});
		
		left = $('#cash').val() - cost;
		$('#left').text( numeral(left).format('0,0') );
	});
});

// recursive function to get price
	function grab(name, quantity, build_per, data) {
		var ret = 0;

		if(typeof data[name] === "number") {
			ret = data[name];
		}

		else if(typeof data[name] === "object") {
			for(var k in data[name])
				ret += grab(k, data[name][k], build_per, data);
			ret *= build_per;
//			ret += build_num;
		}

		return quantity * ret;
	}