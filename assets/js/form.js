/**
 * Function to search for valid or invalid inputs within a parent element
 *
 * @param {element} parent The parent element to search for inputs
 * @returns 1 if a valid input is found,
 * -1 if an invalid input is found,
 * 0 if nothing was found
 */
function checkValid(parent) {
	var foundElem;

	foundElem = parent.querySelector('input:valid');
	if (foundElem != null) {
		return 1;
	}
	foundElem = parent.querySelector('input:invalid');
	if (foundElem != null) {
		return -1;
	}
	return 0;
}

/**
 * Function that adds the 'is-valid' or 'is-invalid' classes to the input group depending on validity
 *
 * @param {int} validity The validity of an input, returned by the checkValid function
 * @param {element} inputGroup The input-group element which will recieve the classes
 * @see checkValidity
 */
function addValidationClasses(validity, inputGroup) {
	if (validity == 1) {
		inputGroup.classList.add('is-valid');
		inputGroup.classList.remove('is-invalid');
	} else if (validity == -1) {
		inputGroup.classList.add('is-invalid');
		inputGroup.classList.remove('is-valid');
	}
}

/**
 * Function that adds the event listeners on the inputs to adjust the style based on validation
 */
function addFormListeners() {
	const inputs = document.querySelectorAll('form.was-validated input.form-control');

	Array.from(inputs).forEach(input => {
		input.addEventListener('keyup', event => {
			const inputGroup = event.target.parentElement.parentElement;
			const validity = checkValid(inputGroup);

			addValidationClasses(validity, inputGroup);
		});
	});
}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
	'use strict'

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	const forms = document.querySelectorAll('.needs-validation');

	// Loop over them and prevent submission
	Array.from(forms).forEach(form => {
		var addedListeners = false;
		form.addEventListener('submit', event => {

			if (!form.checkValidity()) {
				event.preventDefault();
				event.stopPropagation();
			}
			form.classList.add('was-validated');
			if (!addedListeners) {
				const inputs = document.querySelectorAll('form.was-validated input.form-control');

				Array.from(inputs).forEach(input => {
					const inputGroup = input.parentElement.parentElement;
					const validity = checkValid(inputGroup);

					addValidationClasses(validity, inputGroup);
				});
				addFormListeners()
			}
			addedListeners = true;
		}, false)
	})
})()