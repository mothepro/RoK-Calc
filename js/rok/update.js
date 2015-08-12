/**
 * data has changed
 */ 
$('body').on('keyup keypress blur change', 'input', function () {
	var cost = 0, left;

	// get the cost of each material
	$('.materials input').each(function() {
		var item = $(this).attr('data-item'),
			price = grab(
				item,
				$(this).val(),
				$('#build_per').val() / 100 + 1,
				materials
			),
			bell = $('span[data-item="'+ item +'"]');

		// value spent of certain material
		if($(this).val())
			bell
				.removeClass('hide')
				.text( numeral(Math.ceil(price)).format('0,0') );
		else
			bell
				.addClass('hide');
		
		cost += price;
	});

	// total value left
	left = $('#cash').val() - cost;
	
	$('#left').text( numeral(Math.ceil(left)).format('0,0') );
});