/**
 * Create the DOM elements used in operation
 */
$(function(){
	// fragment
	var ul = $('<div>');

	for(item in materials) {
		var li = $('<div>')
			.addClass('row')
			.append(
				$('<input>')
					.attr('type', 'number')
					.attr('min', 0)
					.attr('step', 1)
					.attr('data-item', item)
					.attr('required', true)
				).append(
					$('<label>')
						.text( item )
						.append(
							$('<span>')
								.addClass('spent')
								.addClass('hide')
								.attr('data-item', item)
			));

		ul.append(li);
	}

	$('.materials').html( ul.html() );
});