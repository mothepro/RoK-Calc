// if we get the JSON
$.getJSON('materials.json').success(function(materials){
	var ul = $('<ul>').addClass('materials').attr('id', 'list');

	for(item in materials) {
		var li = $('<li>')
			.append(
				$('<label>')
					.text(item)
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
		var cost = 0;

		// get the cost
		$('#list input').each(function() {
			var price = grab(
					$(this).attr('data-item'),
					$(this).val(),
					$('#build_per').val() / 100 + 1,
					materials
				);
		
			$(this).next('.spent').text( price );
		
			cost += price;
		});
		
		$('#left').text( $('#cash').val() - cost );
	});

	// recursive function to get price
	function grab(name, quantity, build_per) {
		var ret = 0;

		if(typeof materials[name] === "number") {
			ret = materials[name];
		}

		else if(typeof materials[name] === "object") {
			for(var k in materials[name])
				ret += grab(k, materials[name][k], build_per, materials);
			ret *= build_per;
//			ret += build_num;
		}

		return quantity * ret;
	}
});