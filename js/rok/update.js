/**
 * data has changed
 */ 
var update = function () {
	var cost = 0, left;

	// get the cost of each material
	$('.material input').each(function() {
		var item = $(this).attr('data-item'),
			price = grab(
				item,
				$(this).val(),
				$('#build_per').val() / 100 + 1,
				materials
			),
			bell = $('span[data-item="'+ item +'"]');

		// value spent of certain material
		if($(this).val().match(/^[0-9]+$/))
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
	
	$('.status .remain').text( numeral(Math.ceil(left)).format('0,0') );
	
	// display
	if(left >= 0) {
		$('.status')
				.addClass('text-success')
				.removeClass('text-danger');
		$('.status i')
				.addClass('fa-check')
				.removeClass('fa-times');
	} else {
		$('.status')
				.removeClass('text-success')
				.addClass('text-danger');
		$('.status i')
				.removeClass('fa-check')
				.addClass('fa-times');
	}
};

// when to update lines
$('input').on('keyup keypress blur change ready', update);
$(document).ready(update);