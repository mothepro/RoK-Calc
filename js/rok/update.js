/**
 * data has changed
 */ 
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

		$(this).next('.spent').text( numeral(Math.ceil(price)).format('0,0') );

		cost += price;
	});

	left = $('#cash').val() - cost;
	$('#left').text( numeral(Math.ceil(left)).format('0,0') );
});