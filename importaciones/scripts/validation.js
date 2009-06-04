/**
 * Efectura la validacion de formulario
 */
function validationValidateFormClienSide(form) {
	
	var valid = false;
	
	var textArray = document.getElementsByClassName('textValidation',form);
	var mailArray = document.getElementsByClassName('mailValidation',form);	
	var numericArray = document.getElementsByClassName('numericValidation',form);
	var dateArray = document.getElementsByClassName('dateValidation',form);
	
	var textResult = validationValidateElements(textArray, validationTextValidator);
	var mailResult = validationValidateElements(mailArray, validationMailValidator);
	var numericResult = validationValidateElements(numericArray, validationNumericValidator);
	var dateResult = validationValidateElements(dateArray, validationDateValidator);	

	valid = ((textResult.length == 0) && (mailResult.length == 0) && (numericResult.length == 0) && (dateResult.length == 0))

	if (valid == false) {
		validationSetInvalidFields(textResult);
		validationSetInvalidFields(mailResult);
		validationSetInvalidFields(numericResult);
		validationSetInvalidFields(dateResult);
	}
	else {
		form.submit();
	}
	
}

function validationSetInvalidFields(elements) {
	
	for (var i=0; i < elements.length; i++) {
		
	};
	
}

function validationValidateElements(elements, validationFunction) {
	
	var valid = false;
	var processed = Array();
	var count = 0;
	for (var i=0; i < elements.length; i++) {
		valid = validationFunction(elements[i]);
		if (valid != true) {
			processed[count] = elements[i];
			count++;
		}
	};
	
	return processed;
	
}


function validationTextValidator(element) {
	return true;
}

function validationMailValidator(element) {
	return true;
}

function validationNumericValidator(element) {
	return true;
}

function validationDateValidator(element) {
	return false;
}