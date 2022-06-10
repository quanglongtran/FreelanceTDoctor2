jQuery(document).ready(($) => {
	const body = $('body');

	body.on('click', '.clinic-tab-wrapper li a', function () {
		let target = $(this).attr('data-target');
		$('.clinic-tab-wrapper li a').removeClass('active');
		$('.clinic-tab-content').removeClass('active');
		$(this).addClass('active');
		$('#' + target).addClass('active');
	})
});