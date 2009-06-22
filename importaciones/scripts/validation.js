/**
 * Efectura la validacion de formulario
 */
function validationValidateFormClienSide(form) {
	
	var valid = false;
	
	var emptyArray = document.getElementsByClassName('emptyValidation',form);
	var textArray = document.getElementsByClassName('textValidation',form);
	var mailArray = document.getElementsByClassName('mailValidation',form);	
	var numericArray = document.getElementsByClassName('numericValidation',form);
	var dateArray = document.getElementsByClassName('dateValidation',form);
	
	validationClearInvalidFields(emptyArray);
	validationClearInvalidFields(mailArray);	
	validationClearInvalidFields(textArray);
	validationClearInvalidFields(numericArray);
	validationClearInvalidFields(dateArray);
	
	//validaciones
	var emptyResult = validationValidateElements(emptyArray, validationEmptyValidator);
	var textResult = validationValidateElements(textArray, validationTextValidator);
	var mailResult = validationValidateElements(mailArray, validationMailValidator);
	var numericResult = validationValidateElements(numericArray, validationNumericValidator);
	var dateResult = validationValidateElements(dateArray, validationDateValidator);	

	valid = ((emptyResult.length == 0) && (textResult.length == 0) && (mailResult.length == 0) && (numericResult.length == 0) && (dateResult.length == 0))

	if (valid == false) {
		validationSetInvalidFields(emptyResult);
		validationSetInvalidFields(textResult);
		validationSetInvalidFields(mailResult);
		validationSetInvalidFields(numericResult);
		validationSetInvalidFields(dateResult);
		
		alert('Algunos Campos Han Resultado Invalidos, No se ha enviado el Formulario');
	}
	else {
		form.submit();
	}
	
}

function validationClearInvalidFields(elements) {
	
	for (var i=0; i < elements.length; i++) {
		elements[i].style.border = '';
	};
	
}


function validationSetInvalidFields(elements) {
	
	for (var i=0; i < elements.length; i++) {
		elements[i].style.border = '1px solid red';
		elements[i].style.background = 'pink';
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

function validationEmptyValidator(element) {

	if (element.value == '') {
		return false;
	}

	return true;
}

function validationTextValidator(element) {
	
	return validateField(element, 'txt');
}

function validationMailValidator(element) {

	return validateField(element, 'email');

}

function validationNumericValidator(element) {

	return validateField(element, 'num');

}

function validationDateValidator(element) {
	
	return validateField(element, 'date');
	
}

function validationValidateFieldThruAjax(element,doAction) {

	var url = 'Main.php?do=' + doAction;
	var fields = element.name + '=' + element.value; 
	var myAjax = new Ajax.Request(
				url,
				{
					method: 'post',
					postBody: fields,
					onSuccess: function(transport) {
						var response = transport.responseText.evalJSON();

						$(response.name).style.border = '';

						if (response.value == 1) {
							//es invalido
							$(response.name).style.border = '1px solid red';
						}
						
						var elementName = response.name + '_box';
						var element = $(response.name + '_box');
						if (element != null)
							element.innerHTML = response.message;
												
					}
					
				});

}