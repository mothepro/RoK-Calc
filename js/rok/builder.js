/**
 * Create the DOM elements used in operation
 */
var ul = $('<ul>').addClass('materials').attr('id', 'list');

for(item in materials) {
	var li = $('<li>')
		.append(
			$('<label>')
				.text( item )// no camelcase
				.append(
				$('<input>')
					.attr('type', 'number')
					.attr('data-item', item)
					.addClass('col-black')
					.addClass('spent')
					.val('fff0')
				).append(
					$('<span>')
						.addClass('spent')
						.text(0)
		));

	ul.append(li);
}

$('#list').html( ul.html() );