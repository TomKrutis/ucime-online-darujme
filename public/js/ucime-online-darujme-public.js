
jQuery(function () {

	jQuery(".uod-itself-button").click(function (event) {

		// přepnutí tlačítek
		jQuery("#uod-itself-button").addClass("uod-itself-button").removeClass("uod-company-button");
		jQuery("#uod-company-button").addClass("uod-company-button").removeClass("uod-itself-button");

		let amounts = jQuery(".uod-amount-value");

		amounts.each(function (index, element) {
			jQuery(this).text(numberWithSpaces(jQuery(this).closest(".col-md-4").find(".uod_amount_itself").val()));
		});

		// vynulování counterů
		jQuery(".uod-counter").text(0);

		// vynulování celkové částky
		jQuery("#uod-total-amount").text(0);

	});

	jQuery(".uod-company-button").click(function (event) {
		// přepnutí tlačítek
		jQuery("#uod-company-button").addClass("uod-itself-button").removeClass("uod-company-button");
		jQuery("#uod-itself-button").addClass("uod-company-button").removeClass("uod-itself-button");

		let amounts = jQuery(".uod-amount-value");

		amounts.each(function (index, element) {
			jQuery(this).text(numberWithSpaces(jQuery(this).closest(".col-md-4").find(".uod_amount_company").val()));
		});

		// vynulování counterů
		jQuery(".uod-counter").text(0);

		// vynulování celkové částky
		jQuery("#uod-total-amount").text(0);

		jQuery("#uod-contribute-link").attr("href", generateDarujmeLink(0));
	});

	jQuery(".uod-minus").click(function () {

		let totalAmount = jQuery("#uod-total-amount");
		let totalAmountValue = parseInt(numberWithoutSpace(totalAmount.text()));

		let counter = jQuery(this).closest(".uod-counter-box").find(".uod-counter");
		let counterValue = parseInt(counter.text());

		let amount = numberWithoutSpace(jQuery(this).closest(".col-md-4").find(".uod-amount-value").text());

		if (counterValue <= 0) {
			return;
		}

		counter.text(counterValue - 1);

		let newTotalAmount = totalAmountValue - amount;
		totalAmount.text(numberWithSpaces(newTotalAmount));

		jQuery("#uod-contribute-link").attr("href", generateDarujmeLink(newTotalAmount));
	});

	jQuery(".uod-plus").click(function (event) {

		let totalAmount = jQuery("#uod-total-amount");
		let totalAmountValue = parseInt(numberWithoutSpace(totalAmount.text()));

		let counter = jQuery(this).closest(".uod-counter-box").find(".uod-counter");
		let counterValue = parseInt(counter.text());

		let amount = numberWithoutSpace(jQuery(this).closest(".col-md-4").find(".uod-amount-value").text());

		counter.text(counterValue + 1);

		let newTotalAmount = totalAmountValue + parseInt(amount);
		totalAmount.text(numberWithSpaces(newTotalAmount));

		jQuery("#uod-contribute-link").attr("href", generateDarujmeLink(newTotalAmount));
	});

	jQuery("#uod-edit-amount-link").click(function () {

		let totalAmount = jQuery("#uod-total-amount");
		let totalAmountValue = parseInt(numberWithoutSpace(totalAmount.text()));

		let editLink = jQuery("#uod-edit-amount-link");

		let editInputBox = jQuery("#uod-edit-amount-input-box");

		// skrytí taláčíka na upravu částky
		editLink.hide();
		// zobrazení boxu s inputem
		editInputBox.show();

		// zakázání tlačítek na plus a mínus
		jQuery(".uod-plus").prop('disabled', true);
		jQuery(".uod-minus").prop('disabled', true);

	});

	jQuery("#uod-edit-amount-input").keyup(function () {

		let totalAmount = jQuery("#uod-total-amount");

		let newTotalAmount = jQuery("#uod-edit-amount-input").val();

		if (!newTotalAmount) {
			newTotalAmount = 0;
		}

		totalAmount.text(numberWithSpaces(newTotalAmount));

		jQuery("#uod-contribute-link").attr("href", generateDarujmeLink(newTotalAmount));

	});

});

function numberWithSpaces(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

function numberWithoutSpace(x) {
	return x.toString().replace(/\s/g, '');
}

function generateDarujmeLink(amount) {
	return "https://www.darujme.cz/darovat/1203574?amount=" + parseInt(numberWithoutSpace(amount));
}