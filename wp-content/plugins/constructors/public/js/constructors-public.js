(function ($) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */


	const ajaxtUrl = '/wp-admin/admin-ajax.php';
	const inputs = document.querySelectorAll('.category-name input');
	let data;
	inputs.forEach((input) => {
		input.addEventListener('click', (e) => {
			data = {
				action: e.target.dataset.action,
				value: e.target.value,
			};
		})
	})


	jQuery.get(ajaxtUrl, data, function (response) {
		console.log(response);
	});


})(jQuery);
const dropdown = document.querySelectorAll('.dropper');
const shop = document.querySelector('.shop');
const block = document.querySelector('.block');
shop.addEventListener('click', (e) => {
	let nextS = block.classList;
	if(nextS.contains('open')) {
		nextS.remove('open');
	}else{
		nextS.add('open');
	}
	console.log(nextS);
})
dropdown.forEach((e) => {
	e.childNodes[1].classList.remove('rotates')
	e.nextSibling.nextSibling.classList.remove('open');
	let open, span, div;
	e.addEventListener('click', (dol) => {
		if (dol.target.localName == 'li') {
			span = dol.target.childNodes[1].classList;
			open = dol.target.nextSibling.nextSibling.classList;
		} else {
			span = dol.target.classList;
			open = dol.target.parentNode.nextSibling.nextSibling.classList;

		}
		if (open.contains('open')) {
			open.remove('open');
			span.remove('rotates');
		} else {
			open.add('open');
			span.add('rotates');

		}
	})
})